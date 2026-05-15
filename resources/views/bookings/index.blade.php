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

<table class="table table-bordered table-striped">

    <thead class="table-dark">

        <tr>
            <th width="50">ID</th>
            <th>User</th>
            <th>Equipment</th>
            <th>Tanggal Booking</th>
            <th>Tanggal Kembali</th>
            <th width="150">Status</th>
            <th width="200">Action</th>
        </tr>

    </thead>

    <tbody>

        @forelse ($bookings as $booking)

        <tr>

            <td>{{ $booking->id }}</td>

            <td>{{ $booking->user->name }}</td>

            <td>{{ $booking->equipment->equipment_name }}</td>

            <td>{{ $booking->booking_date }}</td>

            <td>{{ $booking->return_date }}</td>

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
                   class="btn btn-warning btn-sm">

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

            <td colspan="7" class="text-center">

                Data booking belum tersedia

            </td>

        </tr>

        @endforelse

    </tbody>

</table>

@endsection