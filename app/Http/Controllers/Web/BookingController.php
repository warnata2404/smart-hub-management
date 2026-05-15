<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Equipment;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Menampilkan data booking
     */
    public function index()
    {
        $bookings = Booking::with(['user', 'equipment'])
            ->latest()
            ->get();

        return view('bookings.index', compact('bookings'));
    }

    /**
     * Form tambah booking
     */
    public function create()
    {
        $users = User::all();

        $equipments = Equipment::all();

        return view('bookings.create', compact(
            'users',
            'equipments'
        ));
    }

    /**
     * Simpan booking
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'equipment_id' => 'required',
            'booking_date' => 'required',
            'return_date' => 'required',
            'status' => 'required',
        ]);

        Booking::create([
            'user_id' => $request->user_id,
            'equipment_id' => $request->equipment_id,
            'booking_date' => $request->booking_date,
            'return_date' => $request->return_date,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('bookings.index')
            ->with('success', 'Booking berhasil ditambahkan');
    }

    /**
     * Form edit booking
     */
    public function edit(string $id)
    {
        $booking = Booking::findOrFail($id);

        $users = User::all();

        $equipments = Equipment::all();

        return view('bookings.edit', compact(
            'booking',
            'users',
            'equipments'
        ));
    }

    /**
     * Update booking
     */
    public function update(Request $request, string $id)
    {
        $booking = Booking::findOrFail($id);

        $request->validate([
            'user_id' => 'required',
            'equipment_id' => 'required',
            'booking_date' => 'required',
            'return_date' => 'required',
            'status' => 'required',
        ]);

        $booking->update([
            'user_id' => $request->user_id,
            'equipment_id' => $request->equipment_id,
            'booking_date' => $request->booking_date,
            'return_date' => $request->return_date,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('bookings.index')
            ->with('success', 'Booking berhasil diupdate');
    }

    /**
     * Hapus booking
     */
    public function destroy(string $id)
    {
        $booking = Booking::findOrFail($id);

        $booking->delete();

        return redirect()
            ->route('bookings.index')
            ->with('success', 'Booking berhasil dihapus');
    }
}