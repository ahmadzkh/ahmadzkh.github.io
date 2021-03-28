<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @author Ahmad Zaky Humami
 * @filesource BerandaController.php
 */
class BerandaController extends Controller
{
    public function home()
    {
        return view('landing_page.index');
    }
}
