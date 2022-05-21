@extends('layouts.master')
@section('title')
    <title>Daftar Aset</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">                      
                    <h1 class="m-0 text-dark">Manajemen Aset</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Aset</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <h3 class="card-title">Data Aset</h3>
                            </div>
                            <div class="card-tools">
                                <a href="/aset/create" class="btn btn-primary">Input Aset Baru</a>
                            </div>
                        </div>
                        <div class="card-header">
                            <form class="form" method="get" action="{{ route('search') }}">
                                <div class="form-group w-100 mb-3">
                                    <label for="search" class="d-block mr-2">Pencarian</label>
                                    <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan keyword">
                                    <button type="submit" class="btn btn-primary mb-1">Cari</button>
                                </div>
                            </form>
                        </div>
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                        @endif
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Deskripsi</th>
                                            <th class="text-center">Letak</th>
                                            <th class="text-center">Merek</th>
                                            <th class="text-center">Kategori</th>
                                            <th class="text-center">Jenis</th>
                                            <th class="text-center">Status</th>
                                            <th width="280px" class="text-center">Action</th>
                                        </tr>
                                        @forelse ($aset as $aset)
                                        <tr>
                                            <td class="text-center">{{ ++$i }}</td>
                                            <td>{{ $aset->nama }}</td>
                                            <td>{{ $aset->deskripsi }}</td>
                                            <td>{{ $aset->letak->nama }}</td>
                                            <td>{{ $aset->merek->nama }}</td>
                                            <td>{{ $aset->kategori->nama }}</td>
                                            <td>{{ $aset->jenis->nama }}</td>
                                            <td>{{ $aset->status->nama }}</td>
                                            <td>
                                                <form action="{{ route('aset.destroy',$aset->id) }}" method="POST">
                                                    <a class="btn btn-info" href="{{ route('aset.show',$aset->id) }}">Show</a>
                                                    <a class="btn btn-primary" href="{{ route('aset.edit',$aset->id) }}">Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@stop
