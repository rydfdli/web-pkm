<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    //
    public function index()
    {
        $layanans = Layanan::all()->sortBy('urutan');
        $kontak = \App\Models\Kontak::first();
        $jams = \App\Models\Jam::all();
        $settings = \App\Models\Setting::first();
        // Logic to display the contact information
        return view('kontak', compact('kontak', 'jams', 'layanans', 'settings'));
    }
}
