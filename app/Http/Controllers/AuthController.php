<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('guest')->only('index');
    }

    public function index()
    {
        if (!Auth::user()) {
            return view('auth.login');
        }

        return redirect()->to('/beranda');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            if (Auth::user()->role == 'admin') :
                return redirect()->to('/dashboard');
            else :
                return redirect()->to('/beranda');
            endif;
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
