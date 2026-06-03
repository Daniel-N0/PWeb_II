<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Experience;

class WebController extends Controller
{
    public function beranda()
    {
        $profile = Profile::first();
        return view('beranda', compact('profile'));
    }

    public function profil()
    {
        $profile = Profile::first();
        $experiences = Experience::all(); 
        return view('profil', compact('profile', 'experiences'));
    }

    public function detail($id)
    {
        $detail = Experience::findOrFail($id);
        return view('detail', compact('detail'));
    }
}