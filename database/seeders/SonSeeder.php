<?php

namespace Database\Seeders;

use App\Models\Son;
use App\Models\User;
use Illuminate\Database\Seeder;

class SonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ahmed = User::where('name', 'Ahmed')->first()->id;
        Son::create([
            'user_id'    => $ahmed,
            'name'       => 'Marwa',
            'birth_date' => '1993-08-01',
        ]);
        Son::create([
            'user_id'    => $ahmed,
            'name'       => 'Saher',
            'birth_date' => '1993-11-20',
        ]);


        $nabil = User::where('name', 'Nabil')->first()->id;
        Son::create([
            'user_id'    => $nabil,
            'name'       => 'Sara',
            'birth_date' => '1952-12-22',
        ]);
        Son::create([
            'user_id'    => $nabil,
            'name'       => 'Ayman',
            'birth_date' => '1995-02-11',
        ]);
    }
}
