<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Checkin;
use App\Models\Equipment;
use Illuminate\Http\Request;

class CheckinApiController extends Controller
{
    /**
     * Check-In Equipment
     */
    public function checkin(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'condition_notes' => 'nullable|string'
        ]);

        $booking = Booking::findOrFail($request->booking_id);

        $checkin = Checkin::create([
            'booking_id' => $booking->id,
            'checked_in_at' => now(),
            'condition_notes' => $request->condition_notes
        ]);

        /*
        |--------------------------------------------------------------------------
        | Update Status Equipment
        |--------------------------------------------------------------------------
        */

        $equipment = Equipment::findOrFail($booking->equipment_id);

        $equipment->update([
            'status' => 'borrowed'
        ]);

        /*
        |--------------------------------------------------------------------------
        | Update Status Booking
        |--------------------------------------------------------------------------
        */

        $booking->update([
            'status' => 'approved'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Check-in berhasil',
            'data' => $checkin
        ]);
    }

    /**
     * Check-Out Equipment
     */
    public function checkout(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'condition_notes' => 'nullable|string'
        ]);

        $checkin = Checkin::where('booking_id', $request->booking_id)
            ->firstOrFail();

        $checkin->update([
            'checked_out_at' => now(),
            'condition_notes' => $request->condition_notes
        ]);

        /*
        |--------------------------------------------------------------------------
        | Update Booking
        |--------------------------------------------------------------------------
        */

        $booking = Booking::findOrFail($request->booking_id);

        $booking->update([
            'status' => 'returned'
        ]);

        /*
        |--------------------------------------------------------------------------
        | Update Equipment
        |--------------------------------------------------------------------------
        */

        $equipment = Equipment::findOrFail($booking->equipment_id);

        $equipment->update([
            'status' => 'available'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Check-out berhasil',
            'data' => $checkin
        ]);
    }
}