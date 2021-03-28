<?php

namespace App\Http\Controllers;

use Illuminate\Hashing\BcryptHasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controller\Post;

/**
 * @author Ahmad Zaky Humami
 * @filesource Pages Controller.php
 */
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
        $count_bill_check = DB::table('bills')->where('checked', 'LIKE', '%' . '1' . '%')->count();
        $count_bill_confirm = DB::table('bills')->where('checked', 'LIKE', '%' . '2' . '%')->count();
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
            'count_bill_check' => $count_bill_check,
            'count_bill_confirm' => $count_bill_confirm,
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
        $count_bill_confirm = DB::table('bills')->where('checked', 'LIKE', '%' . '2' . '%')->count();
        $bill_confirm = DB::table('bills')->where('checked', 'LIKE', '%' . '2' . '%')->get();
        $count_bill_check = DB::table('bills')->where('checked', 'LIKE', '%' . '1' . '%')->count();
        $bill_check = DB::table('bills')->where('checked', 'LIKE', '%' . '1' . '%')->get();
        $count_bill_un = DB::table('bills')->where('checked', 'LIKE', '%' . '0' . '%')->count();
        $bill_un = DB::table('bills')->where('checked', 'LIKE', '%' . '0' . '%')->get();
        $count_bill = DB::table('bills')->count();
        $bill = DB::table('bills')->get();

        return view('page.users.admin.pybill', [
            'count_bill_check' => $count_bill_check,
            'bill_check' => $bill_check,
            'count_bill_un' => $count_bill_un,
            'bill_un' => $bill_un,
            'count_bill_confirm' => $count_bill_confirm,
            'bill_confirm' => $bill_confirm,
            'count_bill' => $count_bill,
            'bill' => $bill,
        ]);
    }
    public function pytrans()
    {
        $count_bill_confirm = DB::table('bills')->where('checked', 'LIKE', '%' . '2' . '%')->count();
        $bill_confirm = DB::table('bills')->where('checked', 'LIKE', '%' . '2' . '%')->get();
        $count_bill_check = DB::table('bills')->where('checked', 'LIKE', '%' . '1' . '%')->count();
        $bill_check = DB::table('bills')->where('checked', 'LIKE', '%' . '1' . '%')->get();
        $count_bill_un = DB::table('bills')->where('checked', 'LIKE', '%' . '0' . '%')->count();
        $bill_un = DB::table('bills')->where('checked', 'LIKE', '%' . '0' . '%')->get();
        $count_bill = DB::table('bills')->count();
        $bill = DB::table('bills')->get();

        return view('page.users.admin.pytrans', [
            'count_bill_check' => $count_bill_check,
            'bill_check' => $bill_check,
            'count_bill_un' => $count_bill_un,
            'bill_un' => $bill_un,
            'count_bill_confirm' => $count_bill_confirm,
            'bill_confirm' => $bill_confirm,
            'count_bill' => $count_bill,
            'bill' => $bill,

        ]);
    }
    public function mybill(Request $request)
    {
        $count_bill_confirm = DB::table('bills')->where('checked', 'LIKE', '%' . '2' . '%')->count();
        $bill_confirm = DB::table('bills')->where('checked', 'LIKE', '%' . '2' . '%')->get();
        $count_bill_check = DB::table('bills')->where('checked', 'LIKE', '%' . '1' . '%')->count();
        $bill_check = DB::table('bills')->where('checked', 'LIKE', '%' . '1' . '%')->get();
        $count_bill_un = DB::table('bills')->where('checked', 'LIKE', '%' . '0' . '%')->count();
        $bill_un = DB::table('bills')->where('checked', 'LIKE', '%' . '0' . '%')->get();
        $count_bill = DB::table('bills')->count();
        $bill = DB::table('bills')->get();

        return view('page.users.client.mybill', [
            'count_bill_check' => $count_bill_check,
            'bill_check' => $bill_check,
            'count_bill_un' => $count_bill_un,
            'bill_un' => $bill_un,
            'count_bill_confirm' => $count_bill_confirm,
            'bill_confirm' => $bill_confirm,
            'count_bill' => $count_bill,
            'bill' => $bill
        ]);
    }
    public function search(Request $request)
    {
        if ($request->has('search')) {
            //menampilkan data yang sesuai dengan input form search
            $bill = \App\Models\Bill::where('id_pln', 'LIKE', '%' . $request->search . '%')->get();
            $bill_un = DB::table('bills')->where('checked', 'LIKE', '%' . '0' . '%')->get();
            $count_bill_un = DB::table('bills')->where('checked', 'LIKE', '%' . '0' . '%')->count();

            return view('page.users.client.mybill-check', [
                'bill' => $bill,
                'bill_un' => $bill_un,
                'count_bill_un' => $count_bill_un
            ]);
        } else {
            return redirect('/mybill/not-found')->with('message', 'BILL NOT FOUND');
        }
            return redirect('/mybill/not-found')->with('message', 'BILL NOT FOUND');
    }
    public function notFound()
    {
        return view('page.users.client.mybill-notfound')->with('message', 'BILL NOT FOUND');
    }
    public function mytrans()
    {
        $count_bill_confirm = DB::table('bills')->where('checked', 'LIKE', '%' . '2' . '%')->count();
        $bill_confirm = DB::table('bills')->where('checked', 'LIKE', '%' . '2' . '%')->get();
        $count_bill_check = DB::table('bills')->where('checked', 'LIKE', '%' . '1' . '%')->count();
        $bill_check = DB::table('bills')->where('checked', 'LIKE', '%' . '1' . '%')->get();
        $count_bill = DB::table('bills')->count();
        $bill = DB::table('bills')->get();

        return view('page.users.client.mytrans', [
            'count_bill_check' => $count_bill_check,
            'bill_check' => $bill_check,
            'count_bill_confirm' => $count_bill_confirm,
            'bill_confirm' => $bill_confirm,
            'count_bill' => $count_bill,
            'bill' => $bill,
        ]);
    }
    public function mytransConfirm()
    {
        $count_bill_confirm = DB::table('bills')->where('checked', 'LIKE', '%' . '2' . '%')->count();
        $bill_confirm = DB::table('bills')->where('checked', 'LIKE', '%' . '2' . '%')->get();
        $count_bill_check = DB::table('bills')->where('checked', 'LIKE', '%' . '1' . '%')->count();
        $bill_check = DB::table('bills')->where('checked', 'LIKE', '%' . '1' . '%')->get();
        $count_bill = DB::table('bills')->count();
        $bill = DB::table('bills')->get();

        return view('page.users.client.mytrans-confirm', [
            'count_bill_check' => $count_bill_check,
            'bill_check' => $bill_check,
            'count_bill_confirm' => $count_bill_confirm,
            'bill_confirm' => $bill_confirm,
            'count_bill' => $count_bill,
            'bill' => $bill,
        ]);
    }
    public function billsUnpaid(Request $request)
    {
        $count_client = DB::table('data_pelanggan')->count();
        $clients = DB::table('data_pelanggan')->get();
        if ($request->has('search')) {
            //menampilkan data yang sesuai dengan input form search
            $bills = \App\Models\Bill::where('id_pln', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            // dan ini untuk mengambil data database dari tabel 'data_pelanggan'
            $bills = DB::table('bills')->get();
            $count_bills_un = DB::table('bills')->where('checked', 'LIKE', '%' . '0' . '%')->count();
        }
        // selanjutnya me return hasil dengan view dari folder resource/view/page/users/clientab.blade.php bersama dengan data yang sudah di ambil
        return view('page.users.pln.bills', [
            'bills' => $bills,
            'count_bills_un' => $count_bills_un,
            'clients' => $clients,
            'count_client' => $count_client
        ]);
    }
    public function billsPaid(Request $request)
    {
        $count_client = DB::table('data_pelanggan')->count();
        $clients = DB::table('data_pelanggan')->get();
        if ($request->has('search')) {
            //menampilkan data yang sesuai dengan input form search
            $bills = \App\Models\Bill::where('id_pln', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            // dan ini untuk mengambil data database dari tabel 'data_pelanggan'
            $bills = DB::table('bills')->get();
            $count_bills_check = DB::table('bills')->where('checked', 'LIKE', '%' . '1' . '%')->count();
        }
        // selanjutnya me return hasil dengan view dari folder resource/view/page/users/clientab.blade.php bersama dengan data yang sudah di ambil
        return view('page.users.pln.bills-paid', [
            'bills' => $bills,
            'count_bills_check' => $count_bills_check,
            'clients' => $clients,
            'count_client' => $count_client
        ]);
    }
    public function billsConfirm(Request $request)
    {
        $count_client = DB::table('data_pelanggan')->count();
        $clients = DB::table('data_pelanggan')->get();
        if ($request->has('search')) {
            //menampilkan data yang sesuai dengan input form search
            $bills = \App\Models\Bill::where('id_pln', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            // dan ini untuk mengambil data database dari tabel 'data_pelanggan'
            $bills = DB::table('bills')->get();
            $count_bills_confirm = DB::table('bills')->where('checked', 'LIKE', '%' . '2' . '%')->count();
        }
        // selanjutnya me return hasil dengan view dari folder resource/view/page/users/clientab.blade.php bersama dengan data yang sudah di ambil
        return view('page.users.pln.bills-confirm', [
            'bills' => $bills,
            'count_bills_confirm' => $count_bills_confirm,
            'clients' => $clients,
            'count_client' => $count_client
        ]);
    }
    public function trans()
    {
        $count_bill_confirm = DB::table('bills')->where('checked', 'LIKE', '%' . '2' . '%')->count();
        $bill_confirm = DB::table('bills')->where('checked', 'LIKE', '%' . '2' . '%')->get();
        $count_bill_check = DB::table('bills')->where('checked', 'LIKE', '%' . '1' . '%')->count();
        $bill_check = DB::table('bills')->where('checked', 'LIKE', '%' . '1' . '%')->get();
        $count_bill = DB::table('bills')->count();
        $bill = DB::table('bills')->get();

        return view('page.users.bank.trans', [
            'count_bill_check' => $count_bill_check,
            'bill_check' => $bill_check,
            'count_bill_confirm' => $count_bill_confirm,
            'bill_confirm' => $bill_confirm,
            'count_bill' => $count_bill,
            'bill' => $bill,
        ]);
    }
    public function back()
    {
        return redirect('dashboard');
    }
}
