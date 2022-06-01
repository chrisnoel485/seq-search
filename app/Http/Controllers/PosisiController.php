<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Hadiah;

class PosisiController extends Controller
{
    //
    public function index()
    {
    	$anggota = Anggota::get();
    	return view('posisi.index', ['anggota' => $anggota]);
    }

}
