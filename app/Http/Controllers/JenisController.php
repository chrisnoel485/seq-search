<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('permission:jenis-list|jenis-create|jenis-edit|jenis-delete', ['only' => ['index','show']]);
         $this->middleware('permission:jenis-create', ['only' => ['create','store']]);
         $this->middleware('permission:jenis-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:jenis-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        //
        $jenis = Jenis::latest()->paginate(100);
        return view('jenis.index', compact('jenis'))
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
        return view('jenis.create');
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
        Jenis::create($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('jenis.index')
            ->with('success', 'Jenis Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $jenis = Jenis::find($id);
        return view('jenis.detail', compact('jenis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $jenis = Jenis::find($id);
        return view('jenis.edit', compact('jenis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jenis  $jenis
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
        Jenis::find($id)->update($request->all());

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('jenis.index')
            ->with('success', 'Jenis Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Jenis::find($id)->delete();
        return redirect()->route('jenis.index')
            ->with('success', 'Jenis Berhasil Dihapus');
    }
}
