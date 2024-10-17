<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login_proses(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email harus diisi',
            'password.required' => 'Password harus diisi',
        ]);
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($data)) {
            $user = Auth::user();

            $request->session()->put('user_id', $user->id);

            if ($user->hasRole('customer')) {
                return redirect()->route('home');
            } elseif ($user->hasRole('admin') || $user->hasRole('seller')) {
                return redirect()->route('dashboard');
            }
        } else {
            return redirect()->route('login')->with('error', 'Email atau Password anda salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('logout', 'Kamu telah keluar');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function register_proses(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ], [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'password.required' => 'Password harus diisi',
        ]);

        // dd($request->all());

        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->email_verified_at = now();
        $data->save();

        $role = Role::findByName($request->role);
        $data->assignRole($role);

        return redirect()->route('login')->with('regis', 'Akun berhasil dibuat');
    }
}
