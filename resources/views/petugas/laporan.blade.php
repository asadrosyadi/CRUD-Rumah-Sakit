@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <br>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>id</th>
                <th>Nama Petugas</th>
                <th>No Telepon</th>
                <th>Username</th>
                <th>Password</th>
                <th>Level</th>
                <th>Pilihan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($datas as $data)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$data->id}}</td>
                <td>{{$data->nm_petugas}}</td>
                <td>{{$data->no_telepon}}</td>
                <td>{{$data->username}}</td>
                <td>{{$data->password}}</td>
                <td>{{$data->level}}</td>
                <td>
                    <a href="#" class="btn btn-success">print</a>
                </td>
            </tr>
            @empty
            <div class="alert alert-danger">
                Data Kosong!
            </div> 
            @endforelse
        </tbody>
    </table>
    {{$datas->links()}}
</div>
@endsection