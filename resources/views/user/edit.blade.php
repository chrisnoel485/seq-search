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
                                <h3 class="card-title">Edit User</h3>
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
                                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="">Nama</label>
                                            <input type="text" name="name" 
                                                value="{{ $user->name }}"
                                                class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" required>
                                            <p class="text-danger">{{ $errors->first('name') }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" name="email" 
                                                value="{{ $user->email }}"
                                                class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" 
                                                required readonly>
                                            <p class="text-danger">{{ $errors->first('email') }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" name="password" 
                                                class="form-control {{ $errors->has('password') ? 'is-invalid':'' }}">
                                            <p class="text-danger">{{ $errors->first('password') }}</p>
                                            <p class="text-warning">Biarkan kosong, jika tidak ingin mengganti password</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <select id="status" name="status" class="form-control">
                                                <option value="1" {{ $user->status =='1'?'selected':'' }}>Aktif</option>
                                                <option value="0" {{ $user->status =='0'?'selected':'' }}>Suspend</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Role</label>
                                            @foreach ($role as $row)
                                            <input type="radio" name="role" 
                                                {{ $user->hasRole($row) ? 'checked':'' }}
                                                value="{{ $row }}"> {{  $row }} <br>
                                            @endforeach
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{ URL::to('user') }}" class="btn btn-outline-info">Kembali</a>
                                            <button class="btn btn-info">Update</button>
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
