<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkin extends Model
{
    protected $fillable = [
        'booking_id',
        'checked_in_at',
        'checked_out_at',
        'condition_notes'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}