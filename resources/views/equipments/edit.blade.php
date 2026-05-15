@extends('layouts.app')

@section('content')

<h4 class="mb-4">Edit Equipment</h4>

<form
    action="{{ route('equipments.update', $equipment->id) }}"
    method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Kode Equipment</label>

        <input
            type="text"
            name="equipment_code"
            value="{{ $equipment->equipment_code }}"
            class="form-control"
            required>
    </div>

    <div class="mb-3">
        <label>Nama Equipment</label>

        <input
            type="text"
            name="equipment_name"
            value="{{ $equipment->equipment_name }}"
            class="form-control"
            required>
    </div>

    <div class="mb-3">
        <label>Kategori</label>

        <input
            type="text"
            name="category"
            value="{{ $equipment->category }}"
            class="form-control"
            required>
    </div>

    <div class="mb-3">
        <label>Stock</label>

        <input
            type="number"
            name="stock"
            value="{{ $equipment->stock }}"
            class="form-control"
            required>
    </div>

    <div class="mb-3">
        <label>Status</label>

        <select name="status" class="form-control">

            <option
                value="available"
                {{ $equipment->status == 'available' ? 'selected' : '' }}>
                Available
            </option>

            <option
                value="borrowed"
                {{ $equipment->status == 'borrowed' ? 'selected' : '' }}>
                Borrowed
            </option>

            <option
                value="maintenance"
                {{ $equipment->status == 'maintenance' ? 'selected' : '' }}>
                Maintenance
            </option>

        </select>
    </div>

    <button type="submit" class="btn btn-primary">
        Update
    </button>

    <a href="{{ route('equipments.index') }}"
       class="btn btn-secondary">

        Kembali
    </a>

</form>

@endsection