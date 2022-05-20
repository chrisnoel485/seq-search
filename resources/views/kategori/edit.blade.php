@extends('layouts.master')
@section('title')
    <title>Daftar Kategori</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">                      
                    <h1 class="m-0 text-dark">Manajemen Kategori</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Kategori</li>
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
                                <h3 class="card-title">Input Kategori</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="nama">Nama Kategori</label>
                                            <input type="text" name="nama" class="form-control" aria-describedby="nama" value="{{ $kategori->nama }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <textarea name="deskripsi" id="deskripsi" cols="5" rows="5" class="form-control" aria-describedby="deskripsi" value="{{ $kategori->deskripsi }}"></textarea>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{ URL::to('kategori') }}" class="btn btn-outline-info">Kembali</a>
                                            <input type="submit" value="Proses" class="btn btn-primary pull-right">
                                        </div>
                                    </form>
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
