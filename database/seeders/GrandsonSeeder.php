<?php

namespace Database\Seeders;

use App\Models\Son;
use App\Models\Grandson;
use Illuminate\Database\Seeder;

class GrandsonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $marwa_ahmed = Son::where('name', 'Marwa')->first()->id;
        Grandson::create([
            'son_id'     => $marwa_ahmed,
            'name'       => 'Ahmed',
            'birth_date' => '2020-01-01',
        ]);
        Grandson::create([
            'son_id'     => $marwa_ahmed,
            'name'       => 'Esraa',
            'birth_date' => '2021-01-01',
        ]);
        Grandson::create([
            'son_id'     => $marwa_ahmed,
            'name'       => 'Yousif',
            'birth_date' => '2022-01-01',
        ]);
        Grandson::create([
            'son_id'     => $marwa_ahmed,
            'name'       => 'Ria',
            'birth_date' => '2023-01-01',
        ]);

        $saher_ahmed = Son::where('name', 'Saher')->first()->id;
        Grandson::create([
            'son_id'     => $saher_ahmed,
            'name'       => 'Evian',
            'birth_date' => '2020-01-01',
        ]);
        Grandson::create([
            'son_id'     => $saher_ahmed,
            'name'       => 'Katalia',
            'birth_date' => '2021-01-01',
        ]);
        Grandson::create([
            'son_id'     => $saher_ahmed,
            'name'       => 'Tiam',
            'birth_date' => '2023-01-01',
        ]);


        $sara_nabil = Son::where('name', 'Sara')->first()->id;
        Grandson::create([
            'son_id'     => $sara_nabil,
            'name'       => 'Sylia',
            'birth_date' => '2020-01-01',
        ]);
        Grandson::create([
            'son_id'     => $sara_nabil,
            'name'       => 'Naila',
            'birth_date' => '2022-01-01',
        ]);
        Grandson::create([
            'son_id'     => $sara_nabil,
            'name'       => 'Selin',
            'birth_date' => '2023-01-01',
        ]);

        $ayman_nabil = Son::where('name', 'Ayman')->first()->id;
        Grandson::create([
            'son_id'     => $ayman_nabil,
            'name'       => 'Ahmed',
            'birth_date' => '2020-01-01',
        ]);
        Grandson::create([
            'son_id'     => $ayman_nabil,
            'name'       => 'Salma',
            'birth_date' => '2021-01-01',
        ]);
        Grandson::create([
            'son_id'     => $ayman_nabil,
            'name'       => 'Mariem',
            'birth_date' => '2022-01-01',
        ]);
    }
}
