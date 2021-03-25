<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use \App\Models\User;

/**
 * @author Ahmad Zaky Humami
 * @filesource LoginController.php
 */
class LoginController extends Controller
{
    public function login()
    {
        return view('validation.login');
    }
    public function regist()
    {
        return view('validation.regist');
    }
    /**
     * 
     */
    public function postlogin(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('dashboard')->with('success', 'Welcome');
        }
        return redirect('login')->with('message', 'Email dan Password salah');
    }
    public function postregist(Request $request)
    {
        //menginsert data dari form /client ke tabel User di database
        $user = new \App\Models\User;
        $user->nama = $request->nama_depan . ' ' . $request->nama_belakang;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); //semua akun user diberi password manual yang nanti dapat diganti
        $user->levels = "Pelanggan";
        $user->remember_token = $request->_token;
        $user->save();

        $data_pelanggan = new \App\Models\Pelanggan;
        $data_pelanggan->kelurahan = 'Kel.' . $request->kelurahan;
        $data_pelanggan->kecamatan = 'Kec.' . $request->kecamatan;
        $data_pelanggan->kode_pos = $request->kode_pos;
        $data_pelanggan->golongan = $request->golongan;
        
        //Menginsert data dari form yg sama dengan foreign key 'user_id' dan id_pln berdasarkan id pada tabel users
        $request->request->add(['user_id' => $user->id]);
        $data_pelanggan = \App\Models\Pelanggan::create($request->all());
        return redirect('login')->with('success', 'Account created successfully');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}
