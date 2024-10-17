@extends('layouts.navbar')

@section('content')
    <div class="container">
        <h1>Edit Menu</h1>
        <form method="POST" action="{{ route('menus.update', $menu->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="nama_menu">Menu Name</label>
                <input type="text" class="form-control @error('nama_menu') is-invalid @enderror" id="nama_menu"
                    name="nama_menu" value="{{ old('nama_menu', $menu->nama_menu) }}" required>
                @error('nama_menu')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="harga">Price</label>
                <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga"
                    name="harga" value="{{ old('harga', $menu->harga) }}" required>
                @error('harga')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="foto">Upload Image</label>
                <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto"
                    accept="image/*">
                @error('foto')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Menu</button>
            <a href="{{ route('merchant.menus.index', $merchant->id) }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
