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
                                <h3 class="card-title">Data Merek</h3>
                            </div>
                            <div class="card-tools">
                                @can('merek-create')
                                <a href="/merek/create" class="btn btn-primary">Input Merek Baru</a>
                                @endcan
                            </div>
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
                                            <th width="280px" class="text-center">Action</th>
                                        </tr>
                                        @forelse ($merek as $merek)
                                        <tr>
                                            <td class="text-center">{{ ++$i }}</td>
                                            <td>{{ $merek->nama }}</td>
                                            <td>{{ $merek->deskripsi }}</td>
                                            <td>
                                                <form action="{{ route('merek.destroy',$merek->id) }}" method="POST">
                                                    <a class="btn btn-info" href="{{ route('merek.show',$merek->id) }}">Show</a>
                                                    @can('merek-edit')
                                                    <a class="btn btn-primary" href="{{ route('merek.edit',$merek->id) }}">Edit</a>
                                                    @endcan
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('merek-delete')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Tidak ada data</td>
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
