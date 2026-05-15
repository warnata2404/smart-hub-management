@extends('layouts.app')

@section('content')

<h4 class="mb-4">Edit Equipment</h4>

@if ($errors->any())

<div class="alert alert-danger">

    <ul class="mb-0">

        @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

<form
    action="{{ route('equipments.update', $equipment->id) }}"
    method="POST">

    @csrf
    @method('PUT')

    <div class="card shadow-sm">

        <div class="card-body">

            <div class="mb-3">

                <label class="form-label">

                    Kode Equipment

                </label>

                <input
                    type="text"
                    name="equipment_code"
                    value="{{ old('equipment_code', $equipment->equipment_code) }}"
                    class="form-control"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Nama Equipment

                </label>

                <input
                    type="text"
                    name="equipment_name"
                    value="{{ old('equipment_name', $equipment->equipment_name) }}"
                    class="form-control"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Kategori

                </label>

                <input
                    type="text"
                    name="category"
                    value="{{ old('category', $equipment->category) }}"
                    class="form-control"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Stock

                </label>

                <input
                    type="number"
                    name="stock"
                    value="{{ old('stock', $equipment->stock) }}"
                    class="form-control"
                    min="1"
                    required>

            </div>

            <div class="mb-4">

                <label class="form-label">

                    Status

                </label>

                <select name="status"
                        class="form-select">

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

            <button type="submit"
                    class="btn btn-primary me-1">

                Update

            </button>

            <a href="{{ route('equipments.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </div>

</form>

@endsection