@extends('layouts.customer')

@section('content')
    <h1>Keranjang Pesanan</h1>

    @if (Session::has('cart') && count(Session::get('cart')) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Menu</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach (Session::get('cart') as $menuId => $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $menuId) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
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
            <form action="{{ route('checkout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-success">Checkout</button>
            </form>
        </div>

        <div class="text-end">
            <a href="{{ route('invoice.print') }}" class="btn btn-primary">Cetak Invoice</a>
        </div>
    @else
        <p>Keranjang Anda kosong.</p>
    @endif
@endsection
