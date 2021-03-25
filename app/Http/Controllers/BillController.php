<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BillController extends Controller
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
        $count_client = DB::table('data_pelanggan')->count();
        $clients = DB::table('data_pelanggan')->get();
        if ($request->has('search')) {
            //menampilkan data yang sesuai dengan input form search
            $bills = \App\Models\Bill::where('id_pln', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            // dan ini untuk mengambil data database dari tabel 'data_pelanggan'
            $bills = DB::table('bills')->get();
            $count_bills = DB::table('bills')->count();
        }
        // selanjutnya me return hasil dengan view dari folder resource/view/page/users/clientab.blade.php bersama dengan data yang sudah di ambil
        return view('page.users.bills', [
            'bills' => $bills,
            'count_bills' => $count_bills,
            'clients' => $clients,
            'count_client' => $count_client
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $client = \App\Models\Pelanggan::find($id);
        return view('page.users.pln.bills-create', [
            'client' => $client
        ]);
    }

    public function postcreate(Request $request)
    {
        $bills = new \App\Models\Bill;
        $bills->nama = $request->nama_depan . ' ' . $request->nama_belakang;
        $bills->bulan = $request->bulan;
        $bills->tahun = $request->tahun;
        $bills->first_meter = $request->first_meter;
        $bills->last_meter = $request->last_meter;
        $bills = \App\Models\Bill::create($request->all());
        return redirect('bills')->with('success', '1 Bills added successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bills = new \App\Models\Bill;
        $bills->nama = $request->nama_depan . ' ' . $request->nama_belakang;
        $bills->bulan = $request->bulan;
        $bills->tahun = $request->tahun;
        $bills->first_meter = $request->first_meter;
        $bills->last_meter = $request->last_meter;
        $bills = \App\Models\Bill::create($request->all());
        return redirect('bills')->with('success', '1 Bills added successfully');
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
        $bill = \App\Models\Bill::find($id);
        return view('page.users.client.mybill-check', ['bill' => $bill]);
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
        $bill = \App\Models\Bill::find($id);
        $bill->update($request->all());
        return redirect('/mybill')->with('succes', '1 Bill was checked');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
