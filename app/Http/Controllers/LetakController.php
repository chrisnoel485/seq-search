<?php

namespace App\Http\Controllers;

use App\Models\Letak;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class LetakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:letak-list|letak-create|letak-edit|letak-delete', ['only' => ['index','show']]);
         $this->middleware('permission:letak-create', ['only' => ['create','store']]);
         $this->middleware('permission:letak-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:letak-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        //
        //$kategori = Kategori::latest()->paginate(5);
        //return view('kategori.index', compact('kategori'))
        //    ->with('i', (request()->input('page', 1) - 1) * 5);


        $letak = Letak::with('kategori')->latest()->paginate(5);
        return view('letak.index', compact('letak'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function search(Request $request)
    {
        $search = $request->search;        
        $letak = Letak::where('nama', 'like', "%" . $search . "%")->with('kategori')->paginate(5);
        return view('letak.index', compact('letak'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategori = Kategori::all();
        return view('letak.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'kategori_id' => 'required',
        ]);
        Letak::create($request->all());
        DB::table('letak_a_s')->insert([
            'nama' => $request->nama,
        ]);
        return redirect()->route('letak.index')
            ->with('success', 'Letak Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Letak  $letak
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $letak = Letak::findOrFail($id);
        return view('letak.detail', compact('letak'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Letak  $letak
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $letak = Letak::findOrFail($id);
        $kategori = Kategori::all();
        return view('letak.edit', compact('letak','kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Letak  $letak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'kategori_id' => 'required',
        ]);

        //fungsi eloquent untuk mengupdate data inputan kita
        Letak::find($id)->update($request->all());

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('letak.index')
            ->with('success', 'Letak Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Letak  $letak
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Letak::find($id)->delete();
        return redirect()->route('letak.index')
            ->with('success', 'Letak Berhasil Dihapus');
    }
}
