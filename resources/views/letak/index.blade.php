@extends('layouts.master')
@section('title')
    <title>Daftar Letak</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">                      
                    <h1 class="m-0 text-dark">Manajemen Letak</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Letak</li>
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
                                <h3 class="card-title">Data Letak</h3>
                            </div>
                            <div class="card-tools">
                                @can('letak-create')
                                <a href="/letak/create" class="btn btn-primary">Input Letak Baru</a>
                                @endcan
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
                                            <th class="text-center">Kategori</th>
                                            <th width="280px" class="text-center">Action</th>
                                        </tr>
                                        @forelse ($letak as $letak)
                                        <tr>
                                            <td class="text-center">{{ ++$i }}</td>
                                            <td>{{ $letak->nama }}</td>
                                            <td>{{ $letak->deskripsi }}</td>
                                            <td>{{ $letak->kategori->nama }}</td>
                                            <td>
                                                <form action="{{ route('letak.destroy',$letak->id) }}" method="POST">
                                                    <a class="btn btn-info" href="{{ route('letak.show',$letak->id) }}">Show</a>
                                                    @can('letak-edit')
                                                    <a class="btn btn-primary" href="{{ route('letak.edit',$letak->id) }}">Edit</a>
                                                    @endcan
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('letak-delete')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                    @endcan
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
