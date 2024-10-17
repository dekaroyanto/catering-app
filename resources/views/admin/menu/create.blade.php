@extends('layouts.navbar')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Create Menu for {{ $merchant->nama_merchant }}</h1>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('merchant.menus.store', $merchant->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('nama_menu') is-invalid @enderror" id="floatingInput"
                        placeholder="Masukan Nama Menu" name="nama_menu">
                    <label for="floatingInput">Nama Menu</label>
                    @error('nama_menu')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control @error('harga') is-invalid @enderror" id="floatingInput"
                        placeholder="Masukan Harga" name="harga">
                    <label for="floatingInput">Harga</label>
                    @error('harga')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto Menu</label>
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto"
                        name="foto">
                    @error('foto')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-2">Submit</button>
            </form>
        </div>
    </div>
@endSection
