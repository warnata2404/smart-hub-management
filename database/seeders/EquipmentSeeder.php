<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Equipment;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $equipments = [

            [
                'equipment_code' => 'EQ001',
                'equipment_name' => 'Laptop Asus ROG',
                'category' => 'Laptop',
                'stock' => 5,
                'status' => 'available',
            ],

            [
                'equipment_code' => 'EQ002',
                'equipment_name' => 'Camera Sony A7',
                'category' => 'Camera',
                'stock' => 3,
                'status' => 'borrowed',
            ],

            [
                'equipment_code' => 'EQ003',
                'equipment_name' => 'Microphone Rode',
                'category' => 'Audio',
                'stock' => 8,
                'status' => 'maintenance',
            ],

            [
                'equipment_code' => 'EQ004',
                'equipment_name' => 'Projector Epson',
                'category' => 'Projector',
                'stock' => 2,
                'status' => 'available',
            ],

            [
                'equipment_code' => 'EQ005',
                'equipment_name' => 'Monitor LG 24 Inch',
                'category' => 'Monitor',
                'stock' => 6,
                'status' => 'borrowed',
            ],

            [
                'equipment_code' => 'EQ006',
                'equipment_name' => 'Studio Light Godox',
                'category' => 'Lighting',
                'stock' => 4,
                'status' => 'maintenance',
            ],

            [
                'equipment_code' => 'EQ007',
                'equipment_name' => 'Tripod Canon',
                'category' => 'Accessory',
                'stock' => 10,
                'status' => 'available',
            ],

            [
                'equipment_code' => 'EQ008',
                'equipment_name' => 'Drawing Tablet Wacom',
                'category' => 'Design',
                'stock' => 3,
                'status' => 'borrowed',
            ],

            [
                'equipment_code' => 'EQ009',
                'equipment_name' => 'Speaker JBL',
                'category' => 'Audio',
                'stock' => 5,
                'status' => 'available',
            ],

            [
                'equipment_code' => 'EQ010',
                'equipment_name' => 'PC Editing Ryzen 7',
                'category' => 'Computer',
                'stock' => 2,
                'status' => 'maintenance',
            ],

        ];

        foreach ($equipments as $equipment) {

            Equipment::create($equipment);

        }
    }
}