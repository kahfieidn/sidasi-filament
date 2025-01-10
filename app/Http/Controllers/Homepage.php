<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Homepage extends Controller
{
    //
    public function index()
    {
        return view('welcome');
    }

    public function statistik_data_perizinan()
    {
        return view('statistik_data_perizinan');
    }

    public function statistik_data_investasi()
    {
        return view('statistik_data_investasi');
    }
}
