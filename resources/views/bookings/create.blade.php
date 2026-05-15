@extends('layouts.app')

@section('content')

<h4 class="mb-4">Tambah Booking</h4>

<form action="{{ route('bookings.store') }}" method="POST">

    @csrf

    <div class="mb-3">

        <label>User</label>

        <select name="user_id" class="form-control">

            @foreach ($users as $user)

            <option value="{{ $user->id }}">
                {{ $user->name }}
            </option>

            @endforeach

        </select>

    </div>

    <div class="mb-3">

        <label>Equipment</label>

        <select name="equipment_id" class="form-control">

            @foreach ($equipments as $equipment)

            <option value="{{ $equipment->id }}">
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
            class="form-control"
            required>
    </div>

    <div class="mb-3">

        <label>Tanggal Kembali</label>

        <input
            type="datetime-local"
            name="return_date"
            class="form-control"
            required>
    </div>

    <div class="mb-3">

        <label>Status</label>

        <select name="status" class="form-control">

            <option value="pending">
                Pending
            </option>

            <option value="approved">
                Approved
            </option>

            <option value="returned">
                Returned
            </option>

        </select>

    </div>

    <button type="submit" class="btn btn-success">
        Simpan
    </button>

</form>

@endsection