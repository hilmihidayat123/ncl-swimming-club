<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\HeroCard;
use App\Models\Kelas;
use App\Models\Cta;
use App\Models\Gallery;
use App\Models\About;
use App\Models\Location;

class HomeController extends Controller
{
    /**
     * Tampilkan halaman home (public)
     */
    public function index()
    {
        return view('ncl.home', [

            // HERO (1 data)
            'hero' => Hero::where('is_active', 1)->first(),
            'heroCards' => HeroCard::where('is_active', 1)->get(),
            

            // KELAS (banyak data)
            'kelas' => Kelas::where('is_active', 1)
                            ->orderBy('sort_order', 'asc')
                            ->get(),

            // CTA (1 data + relasi list)
            'cta' => Cta::where('is_active', 1)->first(),

            // GALLERY (banyak data)
            'gallery' => Gallery::where('is_active', 1)
                                ->orderBy('sort_order', 'asc')
                                ->get(),

            // ABOUT (1 data + relasi points)
            'about' => About::where('is_active', 1)
                           
                            ->first(),

            // LOCATION (1 data)
            'location' => Location::where('is_active', 1)->first(),
        ]);
    }
}
