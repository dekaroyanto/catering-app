@extends('layouts.customer')

@section('content')
    <h1>Invoice Pesanan</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach ($cart as $menuId => $item)
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</td>
                </tr>
                @php $total += $item['price'] * $item['quantity']; @endphp
            @endforeach
            <tr>
                <td colspan="3" class="text-end">Total</td>
                <td>Rp {{ number_format($total, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <div class="text-end">
        <button onclick="window.print()" class="btn btn-secondary">Cetak Invoice</button>
    </div>
@endsection
