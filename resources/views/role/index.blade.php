@extends('layouts.master')
@section('title')
    <title>Daftar Role</title>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">                      
                    <h1 class="m-0 text-dark">Manajemen Role</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Role</li>
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
                                <h3 class="card-title">Data Role</h3>
                            </div>
                            <div class="card-tools">
                                @can('role-create')
                                <a href="/role/create" class="btn btn-primary">Input Role Baru</a>
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
                                    <table class="table table-bordered table-hover">
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Role</th>
                                            <th class="text-center">Guard</th>
                                            <th class="text-center">Created At</th>
                                            <th width="280px" class="text-center">Action</th>
                                        </tr>
                                        @foreach ($roles as $key => $role)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>{{ $role->guard_name }}</td>
                                            <td>{{ $role->created_at }}</td>
                                            <td>
                                                <a class="btn btn-info" href="{{ route('role.show',$role->id) }}">Show</a>
                                                @can('role-edit')
                                                <a class="btn btn-primary" href="{{ route('role.edit',$role->id) }}">Edit</a>
                                                @endcan
                                                @can('role-delete')
                                                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                    {!! Form::close() !!}
                                                @endcan
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
