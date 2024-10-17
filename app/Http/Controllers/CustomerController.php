<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function home()
    {
        $merchants = Merchant::with('menus')->get();
        return view('customer.index', compact('merchants'));
    }
}
