<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BiodataSantri;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class AdminDashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function __invoke(Request $request)
    {
        $year = (int) $request->query('year', now()->year);
        $currentMonth = now()->month;
        $previousMonthDate = now()->subMonth();

        $biodataCollection = BiodataSantri::select('tujuan_jenjang_pendidikan', 'status', 'created_at')->get();

        if ($biodataCollection->isEmpty()) {
            $dummy = $this->buildDummyDataset($year);

            return view('admin.dashboard', array_merge($dummy, [
                'selectedYear' => $year,
            ]));
        }

        $jenjangCounts = [
            'ma' => $this->countByJenjang($biodataCollection, 'ma'),
            'mts' => $this->countByJenjang($biodataCollection, 'mts'),
            'mi' => $this->countByJenjang($biodataCollection, 'mi'),
        ];

        $santriMondokCount = $biodataCollection->where('status', 'verified')->count();

        $summaryCards = collect([
            [
                'label' => 'Pendaftar MA',
                'total' => $jenjangCounts['ma'],
                'growth' => $this->calculateGrowth(
                    $this->countByJenjangAndMonth($biodataCollection, 'ma', now()->year, $currentMonth),
                    $this->countByJenjangAndMonth($biodataCollection, 'ma', $previousMonthDate->year, $previousMonthDate->month)
                ),
            ],
            [
                'label' => 'Pendaftar MTs',
                'total' => $jenjangCounts['mts'],
                'growth' => $this->calculateGrowth(
                    $this->countByJenjangAndMonth($biodataCollection, 'mts', now()->year, $currentMonth),
                    $this->countByJenjangAndMonth($biodataCollection, 'mts', $previousMonthDate->year, $previousMonthDate->month)
                ),
            ],
            [
                'label' => 'Pendaftar MI',
                'total' => $jenjangCounts['mi'],
                'growth' => $this->calculateGrowth(
                    $this->countByJenjangAndMonth($biodataCollection, 'mi', now()->year, $currentMonth),
                    $this->countByJenjangAndMonth($biodataCollection, 'mi', $previousMonthDate->year, $previousMonthDate->month)
                ),
            ],
            [
                'label' => 'Santri Mondok',
                'total' => $santriMondokCount,
                'growth' => $this->calculateGrowth(
                    $this->countVerifiedByMonth($biodataCollection, now()->year, $currentMonth),
                    $this->countVerifiedByMonth($biodataCollection, $previousMonthDate->year, $previousMonthDate->month)
                ),
            ],
        ]);

        $monthlyRegistrants = $this->buildMonthlyRegistrants($year);
        $highestMonth = $this->findPeakMonth($monthlyRegistrants);

        $percentageBreakdown = $this->buildPercentageBreakdown([
            'Santri Mondok' => $santriMondokCount,
            'Madrasah Tsanawiyah' => $jenjangCounts['mts'],
            'Madrasah Aliyah' => $jenjangCounts['ma'],
            'Madrasah Ibtidaiyyah' => $jenjangCounts['mi'],
        ]);

        return view('admin.dashboard', [
            'summaryCards' => $summaryCards,
            'monthlyRegistrants' => $monthlyRegistrants,
            'selectedYear' => $year,
            'highlightMonth' => $highestMonth,
            'percentageBreakdown' => $percentageBreakdown,
            'totalRegistrants' => array_sum(array_column($monthlyRegistrants, 'value')),
        ]);
    }

    /**
     * Count biodata entries by jenjang keywords.
     */
    private function countByJenjang(Collection $collection, string $target): int
    {
        return $collection->filter(fn ($item) => $this->matchesJenjang($item->tujuan_jenjang_pendidikan, $target))->count();
    }

    private function countByJenjangAndMonth(Collection $collection, string $target, int $year, int $month): int
    {
        return $collection
            ->filter(function ($item) use ($target, $year, $month) {
                return $this->matchesJenjang($item->tujuan_jenjang_pendidikan, $target)
                    && $item->created_at
                    && $item->created_at->year === $year
                    && $item->created_at->month === $month;
            })
            ->count();
    }

    private function countVerifiedByMonth(Collection $collection, int $year, int $month): int
    {
        return $collection
            ->filter(function ($item) use ($year, $month) {
                return $item->status === 'verified'
                    && $item->created_at
                    && $item->created_at->year === $year
                    && $item->created_at->month === $month;
            })
            ->count();
    }

    private function calculateGrowth(int $current, int $previous): array
    {
        if ($previous === 0) {
            if ($current === 0) {
                return ['value' => 0, 'direction' => 'neutral'];
            }

            return ['value' => 100, 'direction' => 'up'];
        }

        $change = (($current - $previous) / $previous) * 100;

        return [
            'value' => round(abs($change), 1),
            'direction' => $change >= 0 ? 'up' : 'down',
        ];
    }

    private function matchesJenjang(?string $value, string $target): bool
    {
        if (!$value) {
            return false;
        }

        $keywordMap = [
            'ma' => ['ma', 'madrasah aliyah'],
            'mts' => ['mts', 'madrasah tsanawiyah'],
            'mi' => ['mi', 'madrasah ibtidaiyyah'],
        ];

        $value = Str::lower($value);
        $keywords = $keywordMap[$target] ?? [$target];

        return collect($keywords)->contains(fn ($keyword) => Str::contains($value, Str::lower($keyword)));
    }

    private function buildMonthlyRegistrants(int $year): array
    {
        $monthly = BiodataSantri::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->whereYear('created_at', $year)
            ->groupBy('month')
            ->pluck('total', 'month')
            ->toArray();

        return collect(range(1, 12))
            ->map(fn ($month) => [
                'label' => Carbon::create()->month($month)->locale('id')->isoFormat('MMM'),
                'value' => $monthly[$month] ?? 0,
            ])
            ->all();
    }

    private function findPeakMonth(array $monthlyRegistrants): array
    {
        $peak = collect($monthlyRegistrants)->sortByDesc('value')->first() ?? ['label' => 'Jan', 'value' => 0];

        return [
            'label' => $peak['label'],
            'value' => $peak['value'],
        ];
    }

    private function buildPercentageBreakdown(array $counts): array
    {
        $total = array_sum($counts) ?: 1;

        return collect($counts)->map(function ($count, $label) use ($total) {
            return [
                'label' => $label,
                'value' => $count,
                'percentage' => round(($count / $total) * 100, 1),
            ];
        })->values()->all();
    }

    private function buildDummyDataset(int $year): array
    {
        $monthlyMap = [
            1 => 68,
            2 => 74,
            3 => 92,
            4 => 105,
            5 => 118,
            6 => 132,
            7 => 160,
            8 => 150,
            9 => 138,
            10 => 126,
            11 => 110,
            12 => 95,
        ];

        $monthlyRegistrants = collect(range(1, 12))
            ->map(fn ($month) => [
                'label' => Carbon::create($year)->month($month)->locale('id')->isoFormat('MMM'),
                'value' => $monthlyMap[$month] ?? 0,
            ])
            ->all();

        $totalRegistrants = array_sum(array_column($monthlyRegistrants, 'value'));

        $summaryCards = collect([
            [
                'label' => 'Pendaftar MA',
                'total' => 420,
                'growth' => ['value' => 12.5, 'direction' => 'up'],
            ],
            [
                'label' => 'Pendaftar MTs',
                'total' => 380,
                'growth' => ['value' => 8.2, 'direction' => 'up'],
            ],
            [
                'label' => 'Pendaftar MI',
                'total' => 265,
                'growth' => ['value' => 3.4, 'direction' => 'down'],
            ],
            [
                'label' => 'Santri Mondok',
                'total' => 310,
                'growth' => ['value' => 6.8, 'direction' => 'up'],
            ],
        ]);

        $percentageBreakdown = $this->buildPercentageBreakdown([
            'Santri Mondok' => 310,
            'Madrasah Tsanawiyah' => 380,
            'Madrasah Aliyah' => 420,
            'Madrasah Ibtidaiyyah' => 265,
        ]);

        return [
            'summaryCards' => $summaryCards,
            'monthlyRegistrants' => $monthlyRegistrants,
            'highlightMonth' => $this->findPeakMonth($monthlyRegistrants),
            'percentageBreakdown' => $percentageBreakdown,
            'totalRegistrants' => $totalRegistrants,
        ];
    }
}

