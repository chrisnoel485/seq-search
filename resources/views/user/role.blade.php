@extends('layouts.master')
@section('title')
    <title>Daftar Merek</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">                      
                    <h1 class="m-0 text-dark">Manajemen Merek</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Merek</li>
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
                                <h3 class="card-title">Input Merek</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.role', $user->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="table-responsive">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-hover table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama</th>
                                                            <td class="text-center">:</td>
                                                            <td>{{ $user->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Email</th>
                                                            <td class="text-center">:</td>
                                                            <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Role</th>
                                                            <td class="text-center">:</td>
                                                            <td>
                                                                @foreach ($role as $row)
                                                                <input type="radio" name="role" 
                                                                    {{ $user->hasRole($row) ? 'checked':'' }}
                                                                    value="{{ $row }}"> {{  $row }} <br>
                                                                @endforeach
                                                            </td>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
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
    </section>
</div>
@stop
