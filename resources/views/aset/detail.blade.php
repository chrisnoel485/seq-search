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
                                <h3 class="card-title">Detail Aset</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <b>Nama: </b>
                                                {{$aset->nama}}
                                        </li>
                                        <li class="list-group-item">
                                            <b>Deskripsi: </b>
                                                {{$aset->deskripsi}}
                                        </li>
                                        <li class="list-group-item">
                                            <b>Letak: </b>
                                                {{$aset->Letak->nama}}
                                        </li>
                                        <li class="list-group-item">
                                            <b>Merek: </b>
                                                {{$aset->MEREK->nama}}
                                        </li>
                                        <li class="list-group-item">
                                            <b>Kategori: </b>
                                                {{$aset->KATEGORI->nama}}
                                        </li>
                                        <li class="list-group-item">
                                            <b>Jenis: </b>
                                                {{$aset->JENIS->nama}}
                                        </li>
                                        <li class="list-group-item">
                                            <b>Status: </b>
                                                {{$aset->STATUS->nama}}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ URL::to('aset') }}" class="btn btn-outline-info">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@stop
