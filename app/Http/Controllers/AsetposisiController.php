<?php

namespace App\Http\Controllers;

use App\Models\Asetposisi;
use App\Models\AsetA;
use App\Models\LetakA;
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
        $aseta = AsetA::get();
    	return view('asetposisi.index', ['aseta' => $aseta]);
        //$aseta = AsetA::orderBy('created_at', 'DESC')->paginate(10);
    	//return view('asetposisi.index', ['aseta' => $aseta]);
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
