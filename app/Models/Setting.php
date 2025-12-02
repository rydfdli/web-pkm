<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    protected $fillable = [
        'nama_puskesmas',
        'logo',
        'hero_image',
        'wellcome_text',
        'wellcome_subtext',
        'visi_misi_tagline',
        'struktur_tagline',
        'layanan_tagline',
        'kontak_tagline',
        'berita_tagline',
    ];
    
    
}
