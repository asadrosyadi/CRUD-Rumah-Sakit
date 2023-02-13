@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <form class="form-group" action="/petugas/{{$data->id}}" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}

        <div class="row atur-ukuran">
            <label for="nm_petugas">Nama Petugas</label>
            <input type="text" name="nm_petugas" value="{{$data->nm_petugas}}" class="form-control" required>
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="nm_petugas">No Telepon</label>
            <input type="number" name="no_telepon" value="{{$data->no_telepon}}" class="form-control" required>
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="nm_petugas">Username</label>
            <input type="text" name="username" value="{{$data->username}}" class="form-control" required>
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="nm_petugas">Password</label>
            <input type="password" name="password" value="{{$data->password}}" class="form-control" required>
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="nm_petugas">Level</label>
            <select class="form-control" name="level">
                <option value="admin">Admin</option>
                <option value="kasir">Kasir</option>
            </select>
        </div>
<br>
        <div class="row atur-ukuran">
           <a href="/petugas/" class="btn btn-success">Kembali</a>
           <input type="reset" value="reset" class="btn btn-danger">
           <input type="submit" value="submit" class="btn btn-primary">
        </div>       
    </form>
</div>
@endsection