<?php

namespace App\Http\Controllers;

use App\Models\Asetposisi;
use App\Models\Aset;
use App\Models\Letak;
use Illuminate\Http\Request;

class AsetposisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $aset = Aset::orderBy('created_at', 'DESC')->paginate(10);
    	return view('asetposisi.index', ['aset' => $aset]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asetposisi  $asetposisi
     * @return \Illuminate\Http\Response
     */
    public function show(Asetposisi $asetposisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asetposisi  $asetposisi
     * @return \Illuminate\Http\Response
     */
    public function edit(Asetposisi $asetposisi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asetposisi  $asetposisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asetposisi $asetposisi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asetposisi  $asetposisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asetposisi $asetposisi)
    {
        //
    }
}
