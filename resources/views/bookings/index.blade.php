@extends('layouts.app')

@section('content')

<h4 class="mb-4">Data Booking</h4>

<a href="{{ route('bookings.create') }}"
   class="btn btn-primary mb-3">

    Tambah Booking

</a>

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

<table class="table table-bordered table-striped table-hover align-middle">

    <thead class="table-dark">

        <tr>

            <th width="60">No</th>

            <th>User</th>

            <th>Equipment</th>

            <th width="180">Tanggal Booking</th>

            <th width="180">Tanggal Kembali</th>

            <th width="140">Status</th>

            <th width="200">Action</th>

        </tr>

    </thead>

    <tbody>

        @forelse ($bookings as $booking)

        <tr>

            <td>

                {{ $loop->iteration }}

            </td>

            <td>

                {{ $booking->user->name }}

            </td>

            <td>

                {{ $booking->equipment->equipment_code }}
                -
                {{ $booking->equipment->equipment_name }}

            </td>

            <td>

                {{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y H:i') }}

            </td>

            <td>

                {{ \Carbon\Carbon::parse($booking->return_date)->format('d M Y H:i') }}

            </td>

            <td>

                @if($booking->status == 'pending')

                    <span class="badge bg-warning text-dark">

                        Pending

                    </span>

                @elseif($booking->status == 'approved')

                    <span class="badge bg-primary">

                        Approved

                    </span>

                @elseif($booking->status == 'returned')

                    <span class="badge bg-success">

                        Returned

                    </span>

                @endif

            </td>

            <td>

                <a href="{{ route('bookings.edit', $booking->id) }}"
                   class="btn btn-warning btn-sm me-1">

                    Edit

                </a>

                <form
                    action="{{ route('bookings.destroy', $booking->id) }}"
                    method="POST"
                    class="d-inline">

                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin ingin menghapus booking ini?')">

                        Delete

                    </button>

                </form>

            </td>

        </tr>

        @empty

        <tr>

            <td colspan="7"
                class="text-center">

                Data booking belum tersedia

            </td>

        </tr>

        @endforelse

    </tbody>

</table>

@endsection