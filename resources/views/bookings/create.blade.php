@extends('layouts.app')

@section('content')

<h4 class="mb-4">Tambah Booking</h4>

@if ($errors->any())

<div class="alert alert-danger">

    <ul class="mb-0">

        @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

<form action="{{ route('bookings.store') }}"
      method="POST">

    @csrf

    <div class="card shadow-sm">

        <div class="card-body">

            <div class="mb-3">

                <label class="form-label">

                    User

                </label>

                <select name="user_id"
                        class="form-select"
                        required>

                    <option value="">

                        -- Pilih User --

                    </option>

                    @foreach ($users as $user)

                    <option
                        value="{{ $user->id }}"
                        {{ old('user_id') == $user->id ? 'selected' : '' }}>

                        {{ $user->name }}

                    </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Equipment

                </label>

                <select name="equipment_id"
                        class="form-select"
                        required>

                    <option value="">

                        -- Pilih Equipment --

                    </option>

                    @foreach ($equipments as $equipment)

                    <option
                        value="{{ $equipment->id }}"
                        {{ old('equipment_id') == $equipment->id ? 'selected' : '' }}>

                        {{ $equipment->equipment_name }}

                    </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Tanggal Booking

                </label>

                <input
                    type="datetime-local"
                    name="booking_date"
                    class="form-control"
                    value="{{ old('booking_date') }}"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Tanggal Kembali

                </label>

                <input
                    type="datetime-local"
                    name="return_date"
                    class="form-control"
                    value="{{ old('return_date') }}"
                    required>

            </div>

            <div class="mb-4">

                <label class="form-label">

                    Status

                </label>

                <select name="status"
                        class="form-select">

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

            <button type="submit"
                    class="btn btn-success me-1">

                Simpan

            </button>

            <a href="{{ route('bookings.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </div>

</form>

@endsection