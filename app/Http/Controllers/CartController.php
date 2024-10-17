<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        return view('customer.cart', compact('cart'));
    }

    public function store($menuId)
    {
        $cart = Session::get('cart', []);

        // Tambahkan menu ke cart
        if (isset($cart[$menuId])) {
            $cart[$menuId]['quantity']++;
        } else {
            // Jika menu belum ada di cart, ambil data menu dari database
            $menu = Menu::find($menuId);
            $cart[$menuId] = [
                'name' => $menu->nama_menu,
                'price' => $menu->harga,
                'quantity' => 1,
                'image' => $menu->foto
            ];
        }

        Session::put('cart', $cart);

        return redirect()->back()->with('pesan', 'Menu berhasil ditambahkan ke keranjang!');
    }

    public function remove($menuId)
    {
        $cart = Session::get('cart', []);

        // Periksa apakah menu ada di cart
        if (isset($cart[$menuId])) {
            unset($cart[$menuId]); // Hapus item dari cart
            Session::put('cart', $cart);
            return redirect()->back()->with('success', 'Menu berhasil dihapus dari keranjang.');
        }

        return redirect()->back()->with('error', 'Menu tidak ditemukan di keranjang.');
    }

    public function printInvoice()
    {
        $cart = Session::get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang Anda kosong.');
        }

        // Hitung total
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        // Kembalikan tampilan invoice
        return view('customer.invoice', compact('cart', 'total'));
    }
}
