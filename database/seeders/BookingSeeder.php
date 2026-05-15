<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;
use App\Models\Equipment;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $equipments = Equipment::all();

        $statuses = [
            'pending',
            'approved',
            'returned',
        ];

        foreach ($equipments as $index => $equipment) {

            Booking::create([

                'user_id' => 1,

                'equipment_id' => $equipment->id,

                'booking_date' => now(),

                'return_date' => now()->addDays(3),

                'status' => $statuses[$index % 3],

            ]);
        }
    }
}