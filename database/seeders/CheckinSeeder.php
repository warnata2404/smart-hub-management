<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Checkin;

class CheckinSeeder extends Seeder
{
    public function run(): void
    {
        $checkins = [

            /*
            |--------------------------------------------------------------------------
            | APPROVED
            |--------------------------------------------------------------------------
            */

            [
                'booking_id' => 1,
                'checked_in_at' => now(),
                'checked_out_at' => null,
                'condition_notes' => 'Equipment sedang dipinjam'
            ],

            [
                'booking_id' => 2,
                'checked_in_at' => now(),
                'checked_out_at' => null,
                'condition_notes' => 'Equipment sedang digunakan'
            ],

            [
                'booking_id' => 3,
                'checked_in_at' => now(),
                'checked_out_at' => null,
                'condition_notes' => 'Equipment dipinjam untuk produksi'
            ],

            /*
            |--------------------------------------------------------------------------
            | RETURNED
            |--------------------------------------------------------------------------
            */

            [
                'booking_id' => 7,
                'checked_in_at' => now()->subDays(5),
                'checked_out_at' => now()->subDays(2),
                'condition_notes' => 'Dikembalikan dengan baik'
            ],

            [
                'booking_id' => 8,
                'checked_in_at' => now()->subDays(4),
                'checked_out_at' => now()->subDay(),
                'condition_notes' => 'Sudah dikembalikan'
            ],

            [
                'booking_id' => 9,
                'checked_in_at' => now()->subDays(3),
                'checked_out_at' => now(),
                'condition_notes' => 'Equipment kembali normal'
            ],

        ];

        foreach ($checkins as $checkin) {

            Checkin::create($checkin);

        }
    }
}