@extends('layouts.navbar')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Menus toko {{ $merchant->nama_merchant }}</h1>
            <a href="{{ route('merchant.menus.create', $merchant->id) }}" class="btn btn-primary">Tambah Menu</a>
        </div>
        <div class="card-body" style="max-height: 400px; overflow-y: auto;">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Menu</th>
                        <th>Harga</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($merchant->menus as $menu)
                        <tr>
                            <td>{{ $menu->nama_menu }}</td>
                            <td>{{ $menu->harga }}</td>
                            <td><img src="{{ asset('storage/' . $menu->foto) }}" alt="{{ $menu->nama_menu }}" width="100">
                            </td>
                            <td>
                                <div class="d-inline">
                                    <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                    <form id="delete-form-{{ $menu->id }}"
                                        action="{{ route('menus.destroy', $menu->id) }}" method="POST"
                                        class="delete-form d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm btn-delete"
                                            onclick="confirmDelete({{ $menu->id }})">Hapus</button>
                                    </form>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endSection
