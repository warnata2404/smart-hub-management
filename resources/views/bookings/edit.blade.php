@extends('layouts.app')

@section('content')

<h4 class="mb-4">Edit Booking</h4>

<form
    action="{{ route('bookings.update', $booking->id) }}"
    method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">

        <label>User</label>

        <select name="user_id" class="form-control">

            @foreach ($users as $user)

            <option
                value="{{ $user->id }}"
                {{ $booking->user_id == $user->id ? 'selected' : '' }}>

                {{ $user->name }}

            </option>

            @endforeach

        </select>

    </div>

    <div class="mb-3">

        <label>Equipment</label>

        <select name="equipment_id" class="form-control">

            @foreach ($equipments as $equipment)

            <option
                value="{{ $equipment->id }}"
                {{ $booking->equipment_id == $equipment->id ? 'selected' : '' }}>

                {{ $equipment->equipment_name }}

            </option>

            @endforeach

        </select>

    </div>

    <div class="mb-3">

        <label>Tanggal Booking</label>

        <input
            type="datetime-local"
            name="booking_date"
            value="{{ \Carbon\Carbon::parse($booking->booking_date)->format('Y-m-d\TH:i') }}"
            class="form-control"
            required>
    </div>

    <div class="mb-3">

        <label>Tanggal Kembali</label>

        <input
            type="datetime-local"
            name="return_date"
            value="{{ \Carbon\Carbon::parse($booking->return_date)->format('Y-m-d\TH:i') }}"
            class="form-control"
            required>
    </div>

    <div class="mb-3">

        <label>Status</label>

        <select name="status" class="form-control">

            <option
                value="pending"
                {{ $booking->status == 'pending' ? 'selected' : '' }}>

                Pending
            </option>

            <option
                value="approved"
                {{ $booking->status == 'approved' ? 'selected' : '' }}>

                Approved
            </option>

            <option
                value="returned"
                {{ $booking->status == 'returned' ? 'selected' : '' }}>

                Returned
            </option>

        </select>

    </div>

    <button type="submit" class="btn btn-primary">
        Update
    </button>

    <a href="{{ route('bookings.index') }}"
       class="btn btn-secondary">

        Kembali
    </a>

</form>

@endsection