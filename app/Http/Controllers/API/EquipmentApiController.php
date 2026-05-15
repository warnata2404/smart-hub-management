<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Equipment;

class EquipmentApiController extends Controller
{
    /**
     * Menampilkan semua equipment
     */
    public function index()
    {
        $equipments = Equipment::latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'Data equipment berhasil diambil',
            'data' => $equipments
        ]);
    }

    /**
     * Menampilkan detail equipment
     */
    public function show(string $id)
    {
        $equipment = Equipment::findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Detail equipment berhasil diambil',
            'data' => $equipment
        ]);
    }
}