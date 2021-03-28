<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * @author Ahmad Zaky Humami
 * @filesource BillController.php
 */
class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
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
        $bills->id_bill = $request->id_bill;
        $bills->id_pln = $request->id_pln;
        $bills->golongan = $request->golongan;
        $bills->nama = $request->nama_depan . ' ' . $request->nama_belakang;
        $bills->bulan = $request->bulan;
        $bills->tahun = $request->tahun;
        $bills->first_meter = $request->first_meter;
        $bills->last_meter = $request->last_meter;
        $bills->price = $request->price;
        $bills->checked = '0';
        $bills = \App\Models\Bill::create($request->all());
        return redirect('bills-unpaid')->with('success', '1 bill has been successfully created');
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
        return redirect('bills-unpaid')->with('success', '1 Bills added successfully');
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
        $count_bill_confirm = DB::table('bills')->where('checked', 'LIKE', '%' . '2' . '%')->count();
        $bill_confirm = DB::table('bills')->where('checked', 'LIKE', '%' . '2' . '%')->get();
        $count_bill_check = DB::table('bills')->where('checked', 'LIKE', '%' . '1' . '%')->count();
        $bill_check = DB::table('bills')->where('checked', 'LIKE', '%' . '1' . '%')->get();
        $count_bill_un = DB::table('bills')->where('checked', 'LIKE', '%' . '0' . '%')->count();
        $bill_un = DB::table('bills')->where('checked', 'LIKE', '%' . '0' . '%')->get();
        $count_bank = DB::table('data_bank')->count();
        $bank = DB::table('data_bank')->get();
        $users_bank = DB::table('users')->where('levels', 'LIKE', '%' . 'Bank' . '%')->get();

        return view('page.users.client.mybill-payment', [
            'bill' => $bill,
            'count_bill_confirm' => $count_bill_confirm,
            'bill_confirm' => $bill_confirm,
            'count_bill_check' => $count_bill_check,
            'bill_check' => $bill_check,
            'count_bill_un' => $count_bill_un,
            'bill_un' => $bill_un,
            'count_bank' => $count_bank,
            'bank' => $bank,
            'users_bank' => $users_bank
        ]);
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
        $bill->nama = $request->nama;
        $bill->id_pln = $request->id_pln;
        $bill->id_bill = $request->id_bill;
        $bill->updated_at = $request->updated_at;
        $bill->bulan = $request->bulan;
        $bill->tahun = $request->tahun;
        $bill->price = $request->price;
        $bill->first_meter = $request->first_meter;
        $bill->last_meter = $request->last_meter;
        $bill->bank = $request->bank;
        $bill->refer = $request->refer;
        $bill->update($request->all());
        return redirect('/mytrans')->with('success', '1 bill has been checkout');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
        $bill = \App\Models\Bill::find($id);
        $count_bill_confirm = DB::table('bills')->where('checked', 'LIKE', '%' . '2' . '%')->count();
        $bill_confirm = DB::table('bills')->where('checked', 'LIKE', '%' . '2' . '%')->get();
        $count_bill_check = DB::table('bills')->where('checked', 'LIKE', '%' . '1' . '%')->count();
        $bill_check = DB::table('bills')->where('checked', 'LIKE', '%' . '1' . '%')->get();
        $count_bill_un = DB::table('bills')->where('checked', 'LIKE', '%' . '0' . '%')->count();
        $bill_un = DB::table('bills')->where('checked', 'LIKE', '%' . '0' . '%')->get();
        $count_bank = DB::table('data_bank')->count();
        $bank = DB::table('data_bank')->get();
        $users_bank = DB::table('users')->where('levels', 'LIKE', '%' . 'Bank' . '%')->get();

        return view('page.users.bank.trans-confirm', [
            'bill' => $bill,
            'count_bill_confirm' => $count_bill_confirm,
            'bill_confirm' => $bill_confirm,
            'count_bill_check' => $count_bill_check,
            'bill_check' => $bill_check,
            'count_bill_un' => $count_bill_un,
            'bill_un' => $bill_un,
            'count_bank' => $count_bank,
            'bank' => $bank,
            'users_bank' => $users_bank
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirmNow(Request $request, $id)
    {
        $bill = \App\Models\Bill::find($id);
        $bill->nama = $request->nama;
        $bill->id_pln = $request->id_pln;
        $bill->id_bill = $request->id_bill;
        $bill->updated_at = $request->updated_at;
        $bill->bulan = $request->bulan;
        $bill->tahun = $request->tahun;
        $bill->price = $request->price;
        $bill->first_meter = $request->first_meter;
        $bill->last_meter = $request->last_meter;
        $bill->bank = $request->bank;
        $bill->refer = $request->refer;
        $bill->update($request->all());
        return redirect('/trans')->with('success', '1 bill has been confirmed');

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function refuse($id)
    {
        $bill = \App\Models\Bill::find($id);
        $count_bill_confirm = DB::table('bills')->where('checked', 'LIKE', '%' . '2' . '%')->count();
        $bill_confirm = DB::table('bills')->where('checked', 'LIKE', '%' . '2' . '%')->get();
        $count_bill_check = DB::table('bills')->where('checked', 'LIKE', '%' . '1' . '%')->count();
        $bill_check = DB::table('bills')->where('checked', 'LIKE', '%' . '1' . '%')->get();
        $count_bill_un = DB::table('bills')->where('checked', 'LIKE', '%' . '0' . '%')->count();
        $bill_un = DB::table('bills')->where('checked', 'LIKE', '%' . '0' . '%')->get();
        $count_bank = DB::table('data_bank')->count();
        $bank = DB::table('data_bank')->get();
        $users_bank = DB::table('users')->where('levels', 'LIKE', '%' . 'Bank' . '%')->get();

        return view('page.users.bank.trans-refuse', [
            'bill' => $bill,
            'count_bill_confirm' => $count_bill_confirm,
            'bill_confirm' => $bill_confirm,
            'count_bill_check' => $count_bill_check,
            'bill_check' => $bill_check,
            'count_bill_un' => $count_bill_un,
            'bill_un' => $bill_un,
            'count_bank' => $count_bank,
            'bank' => $bank,
            'users_bank' => $users_bank
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function refuseNow(Request $request, $id)
    {
        $bill = \App\Models\Bill::find($id);
        $bill->nama = $request->nama;
        $bill->id_pln = $request->id_pln;
        $bill->id_bill = $request->id_bill;
        $bill->updated_at = $request->updated_at;
        $bill->bulan = $request->bulan;
        $bill->tahun = $request->tahun;
        $bill->price = $request->price;
        $bill->first_meter = $request->first_meter;
        $bill->last_meter = $request->last_meter;
        $bill->bank = $request->bank;
        $bill->checked = $request->checked;
        $bill->update($request->all());
        return redirect('/trans')->with('danger', '1 bill has been rejected');

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
