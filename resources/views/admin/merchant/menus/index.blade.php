@extends('layouts.navbar')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Menus for {{ $merchant->nama_merchant }}</h1>
            <a href="{{ route('merchant.menus.create', $merchant->id) }}" class="btn btn-primary">Tambah Menu</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Menu</th>
                        <th>Harga</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($merchant->menus as $menu)
                        <tr>
                            <td>{{ $menu->nama_menu }}</td>
                            <td>{{ $menu->harga }}</td>
                            <td><img src="{{ asset('storage/' . $menu->foto) }}" alt="{{ $menu->nama_menu }}" width="100">
                            </td>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endSection
