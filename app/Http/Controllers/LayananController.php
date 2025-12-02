<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    //
    public function index()
    {
        $layanans = Layanan::all()->sortBy('urutan');
        $kontak = \App\Models\Kontak::first();
        $settings = \App\Models\Setting::first();
        return view('layanan', compact('layanans', 'kontak', 'settings'));
    }
}
