<?php

namespace App\Http\Controllers;

use App\Models\Letak;
use App\Models\Kategori;
use Illuminate\Http\Request;

class LetakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kategori = Kategori::latest()->paginate(5);
        return view('kategori.index', compact('kategori'))
            ->with('i', (request()->input('page', 1) - 1) * 5);


        $letak = Letak::with('author')->get();
        return view('admin.book.index', compact('books'));
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
     * @param  \App\Models\Letak  $letak
     * @return \Illuminate\Http\Response
     */
    public function show(Letak $letak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Letak  $letak
     * @return \Illuminate\Http\Response
     */
    public function edit(Letak $letak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Letak  $letak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Letak $letak)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Letak  $letak
     * @return \Illuminate\Http\Response
     */
    public function destroy(Letak $letak)
    {
        //
    }
}
