@extends('layouts.app')

@section('content')

<h4 class="mb-4">Data Equipment</h4>

<a href="{{ route('equipments.create') }}"
   class="btn btn-primary mb-3">

    Tambah Equipment

</a>

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

<table class="table table-bordered table-striped table-hover align-middle">

    <thead class="table-dark">

        <tr>

            <th width="100">Kode</th>

            <th>Nama Equipment</th>

            <th>Kategori</th>

            <th width="100">Stock</th>

            <th width="150">Status</th>

            <th width="200">Action</th>

        </tr>

    </thead>

    <tbody>

        @forelse($equipments as $equipment)

        <tr>

            <td>

                {{ $equipment->equipment_code }}

            </td>

            <td>

                {{ $equipment->equipment_name }}

            </td>

            <td>

                {{ $equipment->category }}

            </td>

            <td>

                {{ $equipment->stock }}

            </td>

            <td>

                @if($equipment->status == 'available')

                    <span class="badge bg-success">

                        Available

                    </span>

                @elseif($equipment->status == 'borrowed')

                    <span class="badge bg-warning text-dark">

                        Borrowed

                    </span>

                @elseif($equipment->status == 'maintenance')

                    <span class="badge bg-danger">

                        Maintenance

                    </span>

                @endif

            </td>

            <td>

                <a href="{{ route('equipments.edit', $equipment->id) }}"
                   class="btn btn-warning btn-sm me-1">

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
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin ingin menghapus equipment ini?')">

                        Delete

                    </button>

                </form>

            </td>

        </tr>

        @empty

        <tr>

            <td colspan="6"
                class="text-center">

                Data equipment belum tersedia

            </td>

        </tr>

        @endforelse

    </tbody>

</table>

@endsection