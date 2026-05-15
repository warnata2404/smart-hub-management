@extends('layouts.app')

@section('content')

<h4 class="mb-4">Tambah Equipment</h4>

@if ($errors->any())

<div class="alert alert-danger">

    <ul class="mb-0">

        @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

<form action="{{ route('equipments.store') }}"
      method="POST">

    @csrf

    <div class="card shadow-sm">

        <div class="card-body">

            <div class="mb-3">

                <label class="form-label">

                    Kode Equipment

                </label>

                <input
                    type="text"
                    name="equipment_code"
                    class="form-control"
                    value="{{ old('equipment_code') }}"
                    placeholder="Contoh: EQ011"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Nama Equipment

                </label>

                <input
                    type="text"
                    name="equipment_name"
                    class="form-control"
                    value="{{ old('equipment_name') }}"
                    placeholder="Masukkan nama equipment"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Kategori

                </label>

                <input
                    type="text"
                    name="category"
                    class="form-control"
                    value="{{ old('category') }}"
                    placeholder="Contoh: Laptop, Audio, Camera"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Stock

                </label>

                <input
                    type="number"
                    name="stock"
                    class="form-control"
                    value="{{ old('stock') }}"
                    min="1"
                    required>

            </div>

            <div class="mb-4">

                <label class="form-label">

                    Status

                </label>

                <select name="status"
                        class="form-select">

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

            <button type="submit"
                    class="btn btn-success me-1">

                Simpan

            </button>

            <a href="{{ route('equipments.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </div>

</form>

@endsection