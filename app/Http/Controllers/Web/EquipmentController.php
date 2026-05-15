<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    /**
     * Menampilkan data equipment
     */
    public function index()
    {
        $equipments = Equipment::latest()->get();

        return view('equipments.index', compact('equipments'));
    }

    /**
     * Menampilkan form tambah equipment
     */
    public function create()
    {
        return view('equipments.create');
    }

    /**
     * Menyimpan data equipment
     */
    public function store(Request $request)
    {
        $request->validate([
            'equipment_code' => 'required|unique:equipments',
            'equipment_name' => 'required',
            'category' => 'required',
            'stock' => 'required|integer|min:1',
            'status' => 'required',
        ]);

        Equipment::create([
            'equipment_code' => $request->equipment_code,
            'equipment_name' => $request->equipment_name,
            'category' => $request->category,
            'stock' => $request->stock,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('equipments.index')
            ->with('success', 'Data equipment berhasil ditambahkan');
    }

    /**
     * Menampilkan form edit
     */
    public function edit(string $id)
    {
        $equipment = Equipment::findOrFail($id);

        return view('equipments.edit', compact('equipment'));
    }

    /**
     * Update data equipment
     */
    public function update(Request $request, string $id)
    {
        $equipment = Equipment::findOrFail($id);

        $request->validate([
            'equipment_code' => 'required|unique:equipments,equipment_code,' . $id,
            'equipment_name' => 'required',
            'category' => 'required',
            'stock' => 'required|integer|min:1',
            'status' => 'required',
        ]);

        $equipment->update([
            'equipment_code' => $request->equipment_code,
            'equipment_name' => $request->equipment_name,
            'category' => $request->category,
            'stock' => $request->stock,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('equipments.index')
            ->with('success', 'Data equipment berhasil diupdate');
    }

    /**
     * Hapus equipment
     */
    public function destroy(string $id)
    {
        $equipment = Equipment::findOrFail($id);

        $equipment->delete();

        return redirect()
            ->route('equipments.index')
            ->with('success', 'Data equipment berhasil dihapus');
    }
}