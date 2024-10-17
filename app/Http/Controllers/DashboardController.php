<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if (auth()->user()->can('view_dashboard')) {

            return view('admin.dashboard');
        } else {
            return redirect()->route('login')->with('forbidden', 'Anda tidak memiliki akses');
        }
    }
}
