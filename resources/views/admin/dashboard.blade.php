@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="container-fluid py-4">
        <div class="row align-items-center gy-3 mb-4">
            <div class="col-lg">
                <p class="text-uppercase text-success fw-semibold mb-1 small">Pondok Pesantren Al-Falah Putak</p>
                <h1 class="h2 fw-bold text-dark mb-1">Dashboard Admin</h1>
                <p class="text-muted mb-0">Ringkasan terkini aktivitas pendaftaran santri.</p>
            </div>
            <div class="col-lg-auto">
                <form method="GET" class="d-flex align-items-center gap-2 gap-sm-3">
                    <label for="year" class="form-label fw-semibold text-muted mb-0">Filter Tahun</label>
                    <select id="year" name="year" class="form-select rounded-pill shadow-sm" onchange="this.form.submit()">
                        @foreach (range(now()->year, now()->year - 4) as $year)
                            <option value="{{ $year }}" {{ $year == $selectedYear ? 'selected' : '' }}>{{ $year }}</option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>

        <div class="row g-4 mb-4">
            @foreach ($summaryCards as $card)
                @php
                    $growth = $card['growth'];
                    $isPositive = $growth['direction'] === 'up';
                    $isNeutral = $growth['direction'] === 'neutral';
                    $badgeClass = $isNeutral ? 'bg-light text-secondary' : ($isPositive ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger');
                    $progress = $totalRegistrants > 0 ? min(100, round(($card['total'] / $totalRegistrants) * 100)) : 0;
                @endphp
                <div class="col-12 col-md-6 col-xl-3 d-flex">
                    <div class="card shadow-sm border-0 w-100">
                        <div class="card-body d-flex flex-column gap-3">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="text-muted text-uppercase small mb-1">{{ $card['label'] }}</p>
                                    <h3 class="mb-0 fw-semibold">{{ number_format($card['total']) }}</h3>
                                </div>
                                <span class="badge rounded-pill px-3 py-2 d-inline-flex align-items-center gap-1 {{ $badgeClass }}">
                                    @if ($isNeutral)
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M4 10h12v1.5H4z" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            @if ($isPositive)
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 12l6-6m0 0l6 6m-6-6v12" />
                                            @else
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 12l-6 6m0 0l-6-6m6 6V6" />
                                            @endif
                                        </svg>
                                    @endif
                                    {{ $growth['value'] }}%
                                </span>
                            </div>
                            <div>
                                <div class="d-flex justify-content-between small text-muted mb-1">
                                    <span>Total</span>
                                    <span>{{ $progress }}%</span>
                                </div>
                                <div class="progress bg-light rounded-pill" style="height: 8px;">
                                    <div class="progress-bar rounded-pill border-0" role="progressbar"
                                         style="width: {{ $progress }}%; background-image: linear-gradient(90deg, #f59e0b, #10b981, #047857);"
                                         aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row g-4">
            <div class="col-12 col-xl-8">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
                            <div>
                                <p class="text-muted text-uppercase small mb-1">Total Pendaftar Per Tahun</p>
                                <h2 class="mb-0 fw-semibold">{{ number_format($totalRegistrants) }}</h2>
                            </div>
                            <div class="text-sm-end">
                                <p class="text-uppercase text-muted small mb-1">Pencapaian Tertinggi</p>
                                <p class="mb-0 fw-semibold text-warning">{{ $highlightMonth['label'] }} — {{ $highlightMonth['value'] }} pendaftar</p>
                            </div>
                        </div>
                        <div class="position-relative">
                            <canvas id="registrant-trend" height="140"></canvas>
                            <div class="position-absolute start-50 translate-middle-x bottom-0 pb-3">
                                <div class="border rounded-4 px-4 py-2 bg-white shadow-sm text-center small text-muted">
                                    <span class="fw-semibold text-dark">{{ strtoupper($highlightMonth['label']) }}</span>
                                    <span class="mx-2 text-secondary">•</span>
                                    <span>{{ $highlightMonth['value'] }} pendaftar</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-xl-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-start mb-4">
                            <div>
                                <p class="text-muted text-uppercase small mb-1">Persentase Perbandingan</p>
                                <h4 class="mb-0 fw-semibold">Total Pendaftar</h4>
                            </div>
                            <div class="text-end">
                                <p class="text-uppercase text-muted small mb-1">Total</p>
                                <p class="mb-0 fw-semibold text-success">{{ number_format($totalRegistrants) }} Santri</p>
                            </div>
                        </div>
                        <div class="d-flex flex-column align-items-center">
                            <div class="position-relative" style="width: 220px; height: 220px;">
                                <canvas id="jenjang-share"></canvas>
                                <div class="position-absolute top-50 start-50 translate-middle text-center">
                                    <p class="text-muted small mb-0">Komposisi</p>
                                    <p class="h4 fw-semibold mb-0">{{ number_format($totalRegistrants) }}</p>
                                    <p class="text-uppercase text-muted small mb-0">Santri</p>
                                </div>
                            </div>
                            <div class="mt-4 w-100">
                                @foreach ($percentageBreakdown as $item)
                                    @php
                                        $colors = ['#0f766e', '#2563eb', '#f97316', '#0ea5e9'];
                                        $color = $colors[$loop->index % count($colors)];
                                    @endphp
                                    <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="rounded-circle d-inline-block" style="width: 10px; height: 10px; background-color: {{ $color }};"></span>
                                            <span class="text-muted small text-uppercase">{{ $item['label'] }}</span>
                                        </div>
                                        <div class="text-end">
                                            <p class="mb-0 fw-semibold">{{ $item['percentage'] }}%</p>
                                            <small class="text-muted">{{ $item['value'] }} santri</small>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.6/dist/chart.umd.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const lineCtx = document.getElementById('registrant-trend');
            if (lineCtx) {
                new Chart(lineCtx, {
                    type: 'line',
                    data: {
                        labels: @json(array_map(fn($item) => ucfirst($item['label']), $monthlyRegistrants)),
                        datasets: [{
                            data: @json(array_map(fn($item) => $item['value'], $monthlyRegistrants)),
                            borderColor: '#b45309',
                            backgroundColor: 'rgba(180, 83, 9, 0.1)',
                            borderWidth: 3,
                            pointBackgroundColor: '#0f766e',
                            pointBorderColor: '#ffffff',
                            pointHoverRadius: 6,
                            pointRadius: 5,
                            tension: 0.4,
                            fill: {
                                target: 'origin',
                                above: 'rgba(16, 185, 129, 0.08)'
                            }
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                backgroundColor: '#0f172a',
                                padding: 12,
                                callbacks: {
                                    label: context => `${context.parsed.y} pendaftar`
                                }
                            }
                        },
                        scales: {
                            x: {
                                grid: { display: false },
                                ticks: { color: '#94a3b8', font: { family: 'Figtree' } }
                            },
                            y: {
                                beginAtZero: true,
                                grid: { color: 'rgba(15, 23, 42, 0.08)' },
                                ticks: { color: '#94a3b8', precision: 0 }
                            }
                        }
                    }
                });
            }

            const donutCtx = document.getElementById('jenjang-share');
            if (donutCtx) {
                const donutColors = ['#0f766e', '#2563eb', '#f97316', '#0ea5e9'];
                new Chart(donutCtx, {
                    type: 'doughnut',
                    data: {
                        labels: @json(array_map(fn($item) => $item['label'], $percentageBreakdown)),
                        datasets: [{
                            data: @json(array_map(fn($item) => $item['value'], $percentageBreakdown)),
                            backgroundColor: donutColors,
                            borderWidth: 0,
                            hoverOffset: 12
                        }]
                    },
                    options: {
                        responsive: true,
                        cutout: '75%',
                        plugins: {
                            legend: { display: false }
                        }
                    }
                });
            }
        });
    </script>
@endpush

