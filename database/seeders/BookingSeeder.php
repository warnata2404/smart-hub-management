<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        $bookings = [

            /*
            |--------------------------------------------------------------------------
            | APPROVED
            |--------------------------------------------------------------------------
            */

            [
                'user_id' => 1,
                'equipment_id' => 1,
                'booking_date' => now(),
                'return_date' => now()->addDays(3),
                'status' => 'approved'
            ],

            [
                'user_id' => 1,
                'equipment_id' => 2,
                'booking_date' => now(),
                'return_date' => now()->addDays(2),
                'status' => 'approved'
            ],

            [
                'user_id' => 1,
                'equipment_id' => 3,
                'booking_date' => now(),
                'return_date' => now()->addDays(5),
                'status' => 'approved'
            ],

            /*
            |--------------------------------------------------------------------------
            | PENDING
            |--------------------------------------------------------------------------
            */

            [
                'user_id' => 1,
                'equipment_id' => 4,
                'booking_date' => now(),
                'return_date' => now()->addDays(4),
                'status' => 'pending'
            ],

            [
                'user_id' => 1,
                'equipment_id' => 5,
                'booking_date' => now(),
                'return_date' => now()->addDays(6),
                'status' => 'pending'
            ],

            [
                'user_id' => 1,
                'equipment_id' => 6,
                'booking_date' => now(),
                'return_date' => now()->addDays(1),
                'status' => 'pending'
            ],

            /*
            |--------------------------------------------------------------------------
            | RETURNED
            |--------------------------------------------------------------------------
            */

            [
                'user_id' => 1,
                'equipment_id' => 7,
                'booking_date' => now()->subDays(5),
                'return_date' => now()->subDays(2),
                'status' => 'returned'
            ],

            [
                'user_id' => 1,
                'equipment_id' => 8,
                'booking_date' => now()->subDays(4),
                'return_date' => now()->subDay(),
                'status' => 'returned'
            ],

            [
                'user_id' => 1,
                'equipment_id' => 9,
                'booking_date' => now()->subDays(3),
                'return_date' => now(),
                'status' => 'returned'
            ],

        ];

        foreach ($bookings as $booking) {

            Booking::create($booking);

        }
    }
}