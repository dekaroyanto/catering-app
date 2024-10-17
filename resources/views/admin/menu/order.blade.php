@extends('layouts.navbar')

@section('content')
    <h1>Daftar Pesanan</h1>

    @if ($orders->isEmpty())
        <p>Tidak ada pesanan yang diterima.</p>
    @else
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
    @endif
@endsection
