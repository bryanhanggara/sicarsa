<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@sicarsa.test'],
            [
                'name' => 'Administrator',
                'nik' => '0000000000000000',
                'tempat_lahir' => 'Kediri',
                'tanggal_lahir' => '1990-01-01',
                'jenjang_yang_dituju' => 'MA',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        // $this->call([
        //     BiodataSantriSeeder::class,
        // ]);
    }
}
