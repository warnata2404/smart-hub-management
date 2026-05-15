@extends('layouts.app')

@section('content')

<a href="{{ route('equipments.create') }}"
   class="btn btn-primary mb-3">
    Tambah Equipment
</a>

<table class="table table-bordered">

    <thead>
        <tr>
            <th>Kode</th>
            <th>Nama Equipment</th>
            <th>Kategori</th>
            <th>Stock</th>
            <th>Status</th>
            <th width="200">Action</th>
        </tr>
    </thead>

    <tbody>

        @forelse ($equipments as $equipment)

        <tr>
            <td>{{ $equipment->equipment_code }}</td>
            <td>{{ $equipment->equipment_name }}</td>
            <td>{{ $equipment->category }}</td>
            <td>{{ $equipment->stock }}</td>
            <td>{{ $equipment->status }}</td>

            <td>

                <a href="{{ route('equipments.edit', $equipment->id) }}"
                   class="btn btn-warning btn-sm">
                    Edit
                </a>

                <form
                    action="{{ route('equipments.destroy', $equipment->id) }}"
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
                Data equipment belum tersedia
            </td>
        </tr>

        @endforelse

    </tbody>

</table>

@endsection