@extends('layouts.navbar')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Update Merchant</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('merchant.update', $merchant->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama_merchant">Nama Merchant</label>
                    <input type="text" name="nama_merchant" class="form-control" value="{{ $merchant->nama_merchant }}"
                        required>
                </div>

                <div class="form-group">
                    <label for="kontak_merchant">Kontak Merchant</label>
                    <input type="text" name="kontak_merchant" class="form-control"
                        value="{{ $merchant->kontak_merchant }}" required>
                </div>

                <div class="form-group">
                    <label for="alamat_merchant">Alamat Merchant</label>
                    <textarea name="alamat_merchant" class="form-control" required>{{ $merchant->alamat_merchant }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('merchant.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
