<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Merchant;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $merchants = auth()->user()->merchants;
        return view('admin.merchant.index', compact('merchants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.merchant.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_merchant' => 'required',
            'alamat_merchant' => 'required',
            'kontak_merchant' => 'required',
        ], [
            'nama_merchant.required' => 'Nama harus diisi',
            'alamat_merchant.required' => 'Alamat harus diisi',
            'kontak_merchant.required' => 'Kontak harus diisi',
        ]);

        $merchant = new Merchant();
        $merchant->nama_merchant = $request->nama_merchant;
        $merchant->alamat_merchant = $request->alamat_merchant;
        $merchant->kontak_merchant = $request->kontak_merchant;
        $merchant->user_id = auth()->id();
        $merchant->save();
        return redirect()->route('merchant.index')->with('success', 'Data merchant berhasil ditambahkan');
    }

    public function showMenus(Merchant $merchant)
    {

        if ($merchant->user_id !== auth()->id()) {
            abort(403);
        }

        $menus = $merchant->menus;
        return view('admin.merchant.menus.index', compact('merchant', 'menus'));
    }

    public function createMenu($merchantId)
    {
        $merchant = Merchant::findOrFail($merchantId);
        return view('admin.menu.create', compact('merchant'));
    }

    public function storeMenu(Request $request, $merchantId)
    {
        $request->validate([
            'nama_menu' => 'required',
            'harga' => 'required|numeric',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:10000',
        ], [
            'nama_menu.required' => 'Nama menu harus diisi',
            'harga.required' => 'Harga harus diisi',
            'foto.required' => 'Foto harus diisi',
        ]);

        // Upload foto
        $path = $request->file('foto')->store('menus', 'public');

        // Simpan menu
        $menu = new Menu();
        $menu->nama_menu = $request->nama_menu;
        $menu->harga = $request->harga;
        $menu->foto = $path;
        $menu->merchant_id = $merchantId;
        $menu->save();

        return redirect()->route('merchant.menus.index', $merchantId)->with('success', 'Menu berhasil ditambahkan');
    }

    public function editMenu($menuId)
    {
        $menu = Menu::findOrFail($menuId);
        $merchant = $menu->merchant;

        return view('admin.menu.edit', compact('menu', 'merchant'));
    }


    public function updateMenu(Request $request, $menuId)
    {
        $menu = Menu::findOrFail($menuId);

        $request->validate([
            'nama_menu' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $menu->nama_menu = $request->nama_menu;
        $menu->harga = $request->harga;

        if ($request->hasFile('foto')) {

            $path = $request->file('foto')->store('menu_images', 'public');
            $menu->foto = $path;
        }

        $menu->save();

        return redirect()->route('merchant.menus.index', $menu->merchant_id)
            ->with('editmenu', 'Data berhasil diubah');
    }

    /**
     * Display the specified resource.
     */
    public function showOrders(Merchant $merchant)
    {
        if ($merchant->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access');
        }

        // Ambil semua pesanan terkait menu dari merchant ini
        $orders = $merchant->menus()->with('orders.user')->get()->flatMap->orders;

        return view('admin.menu.order', compact('merchant', 'orders'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $merchant = Merchant::find($id);
        return view('admin.merchant.edit', compact('merchant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Merchant $merchant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Merchant $merchant)
    {
        //
    }
}
