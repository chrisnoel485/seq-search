<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use Illuminate\Http\Request;

class MerekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:merek-list|merek-create|merek-edit|merek-delete', ['only' => ['index','show']]);
         $this->middleware('permission:merek-create', ['only' => ['create','store']]);
         $this->middleware('permission:merek-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:merek-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        //
        $merek = Merek::latest()->paginate(100);
        return view('merek.index', compact('merek'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('merek.create');
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
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        //fungsi eloquent untuk menambah data
        Merek::create($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('merek.index')
            ->with('success', 'Merek Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $merek = Merek::find($id);
        return view('merek.detail', compact('merek'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $merek = Merek::find($id);
        return view('merek.edit', compact('merek'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        //melakukan validasi data
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        //fungsi eloquent untuk mengupdate data inputan kita
        Merek::find($id)->update($request->all());

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('merek.index')
            ->with('success', 'Merek Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merek  $merek
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Merek::find($id)->delete();
        return redirect()->route('merek.index')
            ->with('success', 'Merek Berhasil Dihapus');
    }
}
