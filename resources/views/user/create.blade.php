@extends('layouts.master')
@section('title')
    <title>Daftar User</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">                      
                    <h1 class="m-0 text-dark">Manajemen User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
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
                                <h3 class="card-title">Input User</h3>
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
                                    <form action="{{ route('user.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="nama">Nama User</label>
                                            <input type="text" name="name" placeholder="Masukkan Nama User" class="form-control" aria-describedby="nama">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>                    
                                            <input type="email" name="email" class="form-control" id="email" aria-describedby="email" >                
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>                    
                                            <input type="password" name="password" class="form-control" id="password" aria-describedby="password" >                
                                        </div>
                                        <div class="form-group">
                                            <label for="">Role</label>
                                            <select name="role" class="form-control {{ $errors->has('role') ? 'is-invalid':'' }}" required>
                                                <option value="">Pilih</option>
                                                @foreach ($role as $row)
                                                <option value="{{ $row->name }}">{{ $row->name }}</option>
                                                @endforeach
                                            </select>
                                            <p class="text-danger">{{ $errors->first('role') }}</p>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{ URL::to('user') }}" class="btn btn-outline-info">Kembali</a>
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
