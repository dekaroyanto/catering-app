@extends('layouts.navbar')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Create Merchant</h1>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('merchant.store') }}">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('nama_merchant') is-invalid @enderror" id="floatingInput"
                        placeholder="Masukan Nama" name="nama_merchant">
                    <label for="floatingInput">Nama Merchant</label>
                    @error('nama_merchant')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control  @error('kontak_merchant') is-invalid @enderror"
                        id="floatingInput" placeholder="Masukan Kontak" name="kontak_merchant">
                    <label for="floatingInput">Kontak Merchant</label>
                    @error('kontak_merchant')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-floating">
                    <textarea class="form-control  @error('alamat_merchant') is-invalid @enderror" placeholder="Masukan Alamat"
                        name="alamat_merchant" id="floatingTextarea2" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Alamat</label>
                    @error('alamat_merchant')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-2">Submit</button>
            </form>
        </div>
    </div>
@endSection
