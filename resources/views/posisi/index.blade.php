@extends('layouts.master')
@section('title')
    <title>Daftar History Posisi Aset</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">                      
                    <h1 class="m-0 text-dark">Manajemen History Posisi Aset</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">History Posisi Aset</li>
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
                                <h3 class="card-title">Data History Posisi Aset</h3>
                            </div>
                        </div>
                        <div class="card-header">
                            <form class="form" method="get" action="{{ route('searchposisi') }}">
                                <div class="form-group w-100 mb-3">
                                    <label for="searchposisi" class="d-block mr-2">Pencarian</label>
                                    <input type="text" name="searchposisi" class="form-control w-75 d-inline" id="searchposisi" placeholder="Masukkan keyword">
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
                                    <table class="table table-bordered table-hover">
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Nama Aset</th>
                                            <th class="text-center">History Posisi Aset</th>
                                        </tr>
                                        @php $no = 1; @endphp
                                        @foreach($anggota as $a)
                                        <tr>
                                            <td class="text-center">{{ $no++ }}</td>
                                            <td>{{ $a->nama }}</td>
                                            <td>
                                                <ul>
                                                    @foreach($a->hadiah as $h)
                                                    <li> Letaknya di {{ $h->nama }} Pada Tanggal {{ $h->created_at}}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                        </tr>
                                        @endforeach
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
