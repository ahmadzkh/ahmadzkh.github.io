<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrialController extends Controller
{
    public function admin()
    {
        return view('trial.dashboard-admin-trial')->with('message', 'Not connected with database');
    }
    public function client()
    {
        return view('trial.dashboard-client-trial')->with('message', 'Not connected with database');
    }
    public function pln()
    {
        return view('trial.dashboard-pln-trial')->with('message', 'Not connected with database');
    }
    public function bank()
    {
        return view('trial.dashboard-bank-trial')->with('message', 'Not connected with database');
    }
}
