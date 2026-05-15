@extends('layouts.app')

@section('content')

<h4 class="mb-4">Tambah Equipment</h4>

<form action="{{ route('equipments.store') }}" method="POST">

    @csrf

    <div class="mb-3">
        <label>Kode Equipment</label>

        <input
            type="text"
            name="equipment_code"
            class="form-control"
            required>
    </div>

    <div class="mb-3">
        <label>Nama Equipment</label>

        <input
            type="text"
            name="equipment_name"
            class="form-control"
            required>
    </div>

    <div class="mb-3">
        <label>Kategori</label>

        <input
            type="text"
            name="category"
            class="form-control"
            required>
    </div>

    <div class="mb-3">
        <label>Stock</label>

        <input
            type="number"
            name="stock"
            class="form-control"
            required>
    </div>

    <div class="mb-3">
        <label>Status</label>

        <select name="status" class="form-control">

            <option value="available">
                Available
            </option>

            <option value="borrowed">
                Borrowed
            </option>

            <option value="maintenance">
                Maintenance
            </option>

        </select>
    </div>

    <button type="submit" class="btn btn-success">
        Simpan
    </button>

    <a href="{{ route('equipments.index') }}"
       class="btn btn-secondary">

        Kembali
    </a>

</form>

@endsection