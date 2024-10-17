@extends('layouts.navbar')

@section('content')


    @if ($orders->isEmpty())
        <p>Tidak ada pesanan yang diterima.</p>
    @else
        <div class="card">
            <div class="card-header">
                <h1>Daftar Pesanan</h1>
            </div>
            <div class="card-body" style="max-height: 400px; overflow-y: auto;">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Menu</th>
                            <th>Jumlah</th>
                            <th>Pelanggan</th>
                            <th>Tanggal Pesan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->menu->nama_menu }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->created_at->format('d-m-Y H:i:s') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
