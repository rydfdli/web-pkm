<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class VisiController extends Controller
{
    //
    public function index()
    {
        $layanans = Layanan::all()->sortBy('urutan');
        $kontak = \App\Models\Kontak::first();
        // Logic to handle the visi page
        $visiMisi = \App\Models\VisiMisi::first(); // Fetch the first visi and misi from the database
        $settings = \App\Models\Setting::first();
        return view('visi', compact('visiMisi', 'kontak', 'layanans', 'settings'));
    }
}
