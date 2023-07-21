<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function dashboard()
    {
        if (Auth::check()) {
            $countKaryawan = Karyawan::count();
            $countJabatan = Jabatan::count();
            return view('dashboard', ['countKaryawan' => $countKaryawan, 'countJabatan' => $countJabatan]);
        }

        return redirect("login")->withSuccess('are not allowed to access');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }
    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}