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

    public function searchposisi(Request $request)
    {
        $searchposisi = $request->searchposisi;        
        $anggota = Anggota::where('nama', 'like', "%" . $searchposisi . "%")->paginate(5);
        return view('posisi.index', ['anggota' => $anggota]);
    }

    //public function show($id)
    //{
    //    //
    //    $anggota = Anggota::findOrFail($id);
    //    return view('posisi.show', ['anggota' => $anggota]);
    //}

}
