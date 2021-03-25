<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function home()
    {
        return view('landing_page.index');
    }

    public function service()
    {
        return view('landing_page.service');
    }

    public function about()
    {
        return view('landing_page.about');
    }

    public function trial()
    {
        return view('landing_page.trial');
    }
}
