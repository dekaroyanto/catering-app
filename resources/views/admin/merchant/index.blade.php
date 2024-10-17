@extends('layouts.navbar')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Daftar Merchant</h1>
            <a href="{{ route('merchant.create') }}" class="btn btn-primary">Tambah Data</a>
        </div>
        <div class="card-body" style="max-height: 400px; overflow-y: auto;">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama Merchant</td>
                        <td>Kontak Merchant</td>
                        <td>Alamat Mercanth</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($merchants as $merchant)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $merchant->nama_merchant }}</td>
                            <td>{{ $merchant->kontak_merchant }}</td>
                            <td>{{ $merchant->alamat_merchant }}</td>
                            <td>
                                <form action="" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
