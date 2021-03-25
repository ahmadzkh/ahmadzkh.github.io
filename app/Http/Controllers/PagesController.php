<?php

namespace App\Http\Controllers;

use Illuminate\Hashing\BcryptHasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controller\Post;

class PagesController extends Controller
{
    public function index()
    {
        $count_users = DB::table('users')->count();
        $users = DB::table('users')->get();
        $count_admin = DB::table('data_admin')->count();
        $admin = DB::table('data_admin')->get();
        $count_client = DB::table('data_pelanggan')->count();
        $client = DB::table('data_pelanggan')->get();
        $count_pln = DB::table('data_pln')->count();
        $pln = DB::table('data_pln')->get();
        $count_bank = DB::table('data_bank')->count();
        $bank = DB::table('data_bank')->get();
        $users_bank = DB::table('users')->where('levels', 'LIKE', '%' . 'Bank' . '%')->get();
        $daya = DB::table('daya')->get();
        $count_daya = DB::table('daya')->count();
        $data_pelanggan = DB::table('data_pelanggan')->get();
        $sum_daya = DB::table('daya')->sum('tarif');
        $payments = DB::table('payments')->get();
        $count_bill_check = DB::table('bills')->where('checked', 'LIKE', '%' . '1' . '%')->count();
        $count_bill_un = DB::table('bills')->where('checked', 'LIKE', '%' . '0' . '%')->count();
        $bill = DB::table('bills')->get();
        return view('page.dashboard', [
            'count_users' => $count_users,
            'users' => $users,
            'count_admin' => $count_admin,
            'admin' => $admin,
            'count_client' => $count_client,
            'client' => $client,
            'count_pln' => $count_pln,
            'pln' => $pln,
            'count_bank' => $count_bank,
            'users_bank' => $users_bank,
            'count_daya' => $count_daya,
            'daya' => $daya,
            'data_pelanggan' => $data_pelanggan,
            'sum_daya' => $sum_daya,
            'payments' => $payments,
            'count_bill_check' => $count_bill_check,
            'count_bill_un' => $count_bill_un,
            'bill' => $bill
        ]);
    }
    public function show(Request $request)
    {
        // Route::get('/users', 'App\Http\Controllers\PagesController@show')->name('show');
        $users = DB::table('users')->count();
        if ($request->has('search')) {
            //menampilkan data yang sesuai dengan input form search
            $users = \App\Models\User::where('nama', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            // dan ini untuk mengambil data database dari tabel 'data_admin'
            $users = DB::table('users')->get();
        }
        // selanjutnya me return hasil dengan view dari folder resource/view/page/users/admintab.blade.php bersama dengan data yang sudah di ambil
        return view('page.users.users', ['users' => $users]);
    }
    public function destroy($id)
    {
        $users = \App\Models\User::find($id);
        $users->delete();
        //function delete akan otomatis menghapus 1 row yang telah dipilih sesuai dengan id yang dikirim kan melalui href
        return redirect('/users')->with('deleted', '1 row was deleted');
    }
    public function pybill()
    {
        return view('page.users.admin.pybill');
    }
    public function pytrans()
    {
        return view('page.users.admin.pytrans');
    }
    public function mybill(Request $request)
    {
        $count_bill_check = DB::table('bills')->where('checked', 'LIKE', '%' . '2' . '%')->count();
        $count_bill_un = DB::table('bills')->where('checked', 'LIKE', '%' . '0' . '%')->count();
        $bill = DB::table('bills')->get();
        return view('page.users.client.mybill', [
            'count_bill_check' => $count_bill_check,
            'count_bill_un' => $count_bill_un,
            'bill' => $bill
        ]);
    }
    public function search(Request $request)
    {
        if ($request->has('search')) {
            //menampilkan data yang sesuai dengan input form search
            $bill = \App\Models\Bill::where('id_pln', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            // dan ini untuk mengambil data database dari tabel 'data_admin'
            $bill = DB::table('bills')->get();
        }        
        return view('page.users.client.bill-result', [
            'bill' => $bill,
        ]);

    }
    public function mytrans()
    {
        $count_bill_verif = DB::table('bills')->where('checked', 'LIKE', '%' . '2' . '%')->count();
        $count_bill_check = DB::table('bills')->where('checked', 'LIKE', '%' . '1' . '%')->count();
        $count_bill_un = DB::table('bills')->where('checked', 'LIKE', '%' . '0' . '%')->count();
        $bill = DB::table('bills')->get();
        return view('page.users.client.mytrans', [
            'count_bill_verif' => $count_bill_verif,
            'count_bill_check' => $count_bill_check,
            'count_bill_un' => $count_bill_un,
            'bill' => $bill
        ]);
    }
    public function back()
    {
        return redirect('dashboard');
    }
}
