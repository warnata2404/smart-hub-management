@extends('layouts.app')

@section('content')

<a href="{{ route('bookings.create') }}"
   class="btn btn-primary mb-3">

    Tambah Booking
</a>

<table class="table table-bordered">

    <thead>
        <tr>
            <th>User</th>
            <th>Equipment</th>
            <th>Tanggal Booking</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
            <th width="200">Action</th>
        </tr>
    </thead>

    <tbody>

        @forelse ($bookings as $booking)

        <tr>

            <td>{{ $booking->user->name }}</td>

            <td>{{ $booking->equipment->equipment_name }}</td>

            <td>{{ $booking->booking_date }}</td>

            <td>{{ $booking->return_date }}</td>

            <td>{{ $booking->status }}</td>

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
                        class="btn btn-danger btn-sm">

                        Delete
                    </button>

                </form>

            </td>

        </tr>

        @empty

        <tr>
            <td colspan="6" class="text-center">
                Data booking belum tersedia
            </td>
        </tr>

        @endforelse

    </tbody>

</table>

@endsection