<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Letak;
use App\Models\Kategori;
use App\Models\Jenis;
use App\Models\Merek;
use App\Models\Status;
use Illuminate\Http\Request;

class AsetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $aset = Aset::with('kategori','merek','status','jenis','letak')->latest()->paginate(5);
        return view('aset.index', compact('aset'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function search(Request $request)
    {
        $search = $request->search;        
        $aset = Aset::where('nama', 'like', "%" . $search . "%")->with('kategori','merek','status','jenis','letak')->paginate(5);
        return view('aset.index', compact('aset'))->with('i', (request()->input('page', 1) - 1) * 5);
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
        $merek = Merek::all();
        $jenis = Jenis::all();
        $status = Status::all();
        $letak = Letak::all();
        return view('aset.create', compact('kategori','merek','status','jenis','letak'));
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
            'letak_id' => 'required',
            'merek_id' => 'required',
            'kategori_id' => 'required',
            'jenis_id' => 'required',
            'status_id' => 'required',
        ]);
        Aset::create($request->all());
        return redirect()->route('aset.index')
            ->with('success', 'Aset Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aset  $aset
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $aset = Aset::findOrFail($id);
        return view('aset.detail', compact('aset'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aset  $aset
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $aset = Aset::findOrFail($id);
        $kategori = Kategori::all();
        $merek = Merek::all();
        $jenis = Jenis::all();
        $status = Status::all();
        $letak = Letak::all();
        return view('aset.edit', compact('aset','kategori','merek','status','jenis','letak'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aset  $aset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'letak_id' => 'required',
            'merek_id' => 'required',
            'kategori_id' => 'required',
            'jenis_id' => 'required',
            'status_id' => 'required',
        ]);

        //fungsi eloquent untuk mengupdate data inputan kita
        Aset::find($id)->update($request->all());

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('aset.index')
            ->with('success', 'Aset Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aset  $aset
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        Aset::find($id)->delete();
        return redirect()->route('aset.index')
            ->with('success', 'Aset Berhasil Dihapus');
    }
}
