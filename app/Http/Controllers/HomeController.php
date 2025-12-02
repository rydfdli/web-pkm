<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Layanan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $beritaTerbaru = Berita::where('is_published', true)
        ->orderByDesc('published_at') // pakai published_at, atau created_at jika tidak diisi
        ->take(3)
        ->get();

        $layanans = Layanan::where('is_active', true)
        ->orderBy('urutan')
        ->take(6)
        ->get();

        $kontak = \App\Models\Kontak::first();
        $settings = \App\Models\Setting::first();
        // Logic to display the home page

        $jams = \App\Models\Jam::all();
        return view('index', compact('beritaTerbaru', 'kontak', 'jams', 'layanans', 'settings'));
    }
}
