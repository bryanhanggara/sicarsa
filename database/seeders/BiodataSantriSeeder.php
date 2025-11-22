<?php

namespace Database\Seeders;

use App\Models\BiodataSantri;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class BiodataSantriSeeder extends Seeder
{
    /**
     * Seed dummy biodata santri records for dashboard visualisation.
     */
    public function run(): void
    {
        if (BiodataSantri::query()->exists()) {
            return;
        }

        $faker = Faker::create('id_ID');
        $year = now()->year;

        $monthlyTargets = [
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

        $jenjangOptions = ['MA', 'MTs', 'MI'];
        $statusOptions = ['verified', 'unverified'];
        $genders = ['Laki-laki', 'Perempuan'];

        foreach ($monthlyTargets as $month => $target) {
            for ($i = 0; $i < $target; $i++) {
                $jenjang = Arr::random($jenjangOptions);
                $timestamp = Carbon::create($year, $month, rand(1, 28), rand(8, 17));

                $user = User::factory()->create([
                    'jenjang_yang_dituju' => $jenjang,
                ]);

                $birthDate = $faker->dateTimeBetween('-18 years', '-12 years');

                BiodataSantri::create([
                    'user_id' => $user->id,
                    'foto' => null,
                    'nama_lengkap' => $user->name,
                    'tujuan_jenjang_pendidikan' => $jenjang,
                    'nisn' => $faker->unique()->numerify('############'),
                    'nik_calon_santri' => $faker->unique()->numerify('###############'),
                    'tempat_lahir' => $faker->city(),
                    'tanggal_lahir' => $birthDate,
                    'anak_ke' => rand(1, 5),
                    'jumlah_bersaudara' => rand(1, 6),
                    'jenis_kelamin' => Arr::random($genders),
                    'agama' => 'Islam',
                    'asal_sekolah' => $faker->company() . ' ' . Arr::random(['MI', 'MTs', 'MA']),
                    'nomor_dan_tahun_ijazah' => $faker->bothify('IJZ-####/####'),
                    'no_telepon' => $faker->unique()->numerify('08##########'),
                    'nama_lengkap_ayah' => $faker->name('male'),
                    'pekerjaan_ayah' => Arr::random(['Petani', 'Guru', 'Wiraswasta', 'Pegawai Negeri']),
                    'nomor_telepon_ayah' => $faker->unique()->numerify('08##########'),
                    'alamat_lengkap_ayah' => $faker->address(),
                    'tempat_lahir_ayah' => $faker->city(),
                    'tanggal_lahir_ayah' => $faker->dateTimeBetween('-60 years', '-40 years'),
                    'nama_lengkap_ibu' => $faker->name('female'),
                    'pekerjaan_ibu' => Arr::random(['Ibu Rumah Tangga', 'Guru', 'Wiraswasta']),
                    'nomor_telepon_ibu' => $faker->unique()->numerify('08##########'),
                    'alamat_lengkap_ibu' => $faker->address(),
                    'tempat_lahir_ibu' => $faker->city(),
                    'tanggal_lahir_ibu' => $faker->dateTimeBetween('-55 years', '-38 years'),
                    'provinsi' => $faker->state(),
                    'kecamatan' => $faker->citySuffix(),
                    'kabupaten_kota' => $faker->city(),
                    'detail_alamat' => $faker->streetAddress(),
                    'kartu_keluarga' => null,
                    'akte_kelahiran' => null,
                    'surat_pernyataan_santri' => null,
                    'kartu_indonesia_pintar' => null,
                    'status' => rand(0, 100) > 35 ? 'verified' : Arr::random($statusOptions),
                    'created_at' => $timestamp,
                    'updated_at' => $timestamp,
                ]);
            }
        }
    }
}



