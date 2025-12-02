<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use App\Models\StrukturOrganisasi;

class StrukturController extends Controller
{
    //
    public function index()
    {
        $layanans = Layanan::all()->sortBy('urutan');
        $kontak = \App\Models\Kontak::first();
        // Logic to handle the struktur (structure) page
        $struktur = StrukturOrganisasi::first(); // Fetch the first struktur from the database
        $settings = \App\Models\Setting::first();
        return view('struktur', compact('struktur', 'kontak', 'layanans', 'settings'));
    }
}
