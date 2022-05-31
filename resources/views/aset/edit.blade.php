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
                                <h3 class="card-title">Edit Aset</h3>
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
                                    <form action="{{ route('aset.update', $aset->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="nama">Nama Aset</label>
                                            <input type="text" name="nama" class="form-control" aria-describedby="nama" value="{{ $aset->nama }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <textarea name="deskripsi" id="deskripsi" cols="5" rows="5" class="form-control" aria-describedby="deskripsi" >{{ $aset->deskripsi }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Letak Lama</label>
                                            <select name="letak_id_lama" class="form-control @error('letak_id') is-invalid @enderror">
                                                <option value="">Pilih Letak</option>
                                                    @foreach ($letak as $row)
                                                        <option value="{{ $row->id }}" {{ $row->id == $aset->letak_id ? 'selected':'' }}>
                                                            {{ ucfirst($row->nama) }}
                                                        </option>
                                                    @endforeach
                                            </select>
                                            @error('letak_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">Letak Baru</label>
                                            <select name="letak_id_baru" class="form-control @error('letak_id') is-invalid @enderror">
                                                <option value="">Pilih Letak</option>
                                                    @foreach ($letak as $row)
                                                        <option value="{{ $row->id }}" {{ $row->id == $aset->letak_id ? 'selected':'' }}>
                                                            {{ ucfirst($row->nama) }}
                                                        </option>
                                                    @endforeach
                                            </select>
                                            @error('letak_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nama Merek</label>
                                            <select name="merek_id" class="form-control @error('merek_id') is-invalid @enderror">
                                                <option value="">Pilih Merek</option>
                                                    @foreach ($merek as $row)
                                                        <option value="{{ $row->id }}" {{ $row->id == $aset->merek_id ? 'selected':'' }}>
                                                            {{ ucfirst($row->nama) }}
                                                        </option>
                                                    @endforeach
                                            </select>
                                            @error('merek_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nama Kategori</label>
                                            <select name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror">
                                                <option value="">Pilih Kategori</option>
                                                    @foreach ($kategori as $row)
                                                        <option value="{{ $row->id }}" {{ $row->id == $aset->kategori_id ? 'selected':'' }}>
                                                            {{ ucfirst($row->nama) }}
                                                        </option>
                                                    @endforeach
                                            </select>
                                            @error('kategori_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nama Jenis</label>
                                            <select name="jenis_id" class="form-control @error('jenis_id') is-invalid @enderror">
                                                <option value="">Pilih Jenis</option>
                                                    @foreach ($jenis as $row)
                                                        <option value="{{ $row->id }}" {{ $row->id == $aset->jenis_id ? 'selected':'' }}>
                                                            {{ ucfirst($row->nama) }}
                                                        </option>
                                                    @endforeach
                                            </select>
                                            @error('jenis_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nama Status</label>
                                            <select name="status_id" class="form-control @error('status_id') is-invalid @enderror">
                                                <option value="">Pilih Status</option>
                                                    @foreach ($status as $row)
                                                        <option value="{{ $row->id }}" {{ $row->id == $aset->status_id ? 'selected':'' }}>
                                                            {{ ucfirst($row->nama) }}
                                                        </option>
                                                    @endforeach
                                            </select>
                                            @error('status_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{ URL::to('aset') }}" class="btn btn-outline-info">Kembali</a>
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
