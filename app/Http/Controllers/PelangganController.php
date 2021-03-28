<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * @author Ahmad Zaky Humami
 * @filesource PelangganController.php
 */
class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Route::get('/client', 'App\Http\Controllers\PelangganController@index')->name('index');
        // akan diarahkan ke sini
        $clients = DB::table('data_pelanggan')->count();

        if ($request->has('search')) {
            //menampilkan data yang sesuai dengan input form search
            $data_pelanggan = \App\Models\Pelanggan::where('nama_depan', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            // dan ini untuk mengambil data database dari tabel 'data_pelanggan'
            $data_pelanggan = DB::table('data_pelanggan')->get();
        }
        // selanjutnya me return hasil dengan view dari folder resource/view/page/users/clientab.blade.php bersama dengan data yang sudah di ambil
        return view('page.users.client.clientab', [
            'data_pelanggan' => $data_pelanggan,
            'clients' => $clients
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //menginsert data dari form /client ke tabel User di database
        $user = new \App\Models\User;
        $user->nama = $request->nama_depan . ' ' . $request->nama_belakang;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); //semua akun user diberi password manual yang nanti dapat diganti
        $user->levels = $request->levels;
        $user->remember_token = $request->_token;
        $user->save();

        $data_pelanggan = new \App\Models\Pelanggan;
        $data_pelanggan->kelurahan = 'Kel.' . $request->kelurahan;
        $data_pelanggan->kecamatan = 'Kec.' . $request->kecamatan;
        $data_pelanggan->kode_pos = $request->kode_pos;
        $data_pelanggan->golongan = $request->golongan;
        
        //Menginsert data dari tabel yg sama ke tabel data_client dengan foreign key 'user_id' berdasarkan id pada tabel users
        $request->request->add(['user_id' => $user->id]);
        $data_pelanggan = \App\Models\Pelanggan::create($request->all());
        return redirect('users/client')->with('success', '1 row added successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //menggunakan function bawaan laravel find() dengan parameter id yang didapat dari href di folder view
        $data_pelanggan = \App\Models\Pelanggan::find($id);
        //setelah id berhasil di temukan maka akan diarahkan ke halaman edit
        return view('page.users.client.client-edit', ['data_pelanggan' => $data_pelanggan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data_pelanggan = \App\Models\Pelanggan::find($id);
        //dengan menggunakan function find() dapat dengan mudah mencari id dari tabel data_pelanggan dan meyimpan semua data table pada variabel
        $data_pelanggan->update($request->all());
        //dan function update dan $request->all() akan mengambil/mengirim semua data baru pada form dan menggantikan data lama
        return redirect('/users/client')->with('success', '1 row was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_pelanggan = \App\Models\Pelanggan::find($id);
        $data_pelanggan->delete();
        //function delete akan otomatis menghapus 1 row yang telah dipilih sesuai dengan id yang dikirim kan melalui href
        return redirect('users/client')->with('deleted', '1 row was deleted');
    }
}
