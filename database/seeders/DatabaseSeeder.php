<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Admin User
        |--------------------------------------------------------------------------
        */

        User::create([
            'name' => 'warnata',
            'email' => 'warnata@gmail.com',
            'password' => Hash::make('warnata'),
            'role' => 'admin',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Seeder Equipment & Booking
        |--------------------------------------------------------------------------
        */

        $this->call([

            EquipmentSeeder::class,
            BookingSeeder::class,

        ]);
    }
}