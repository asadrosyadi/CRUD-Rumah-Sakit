@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    @include('petugas.navbardata')
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
                <td style="display:flex; justify-content:space-between;">
                    <a href="/petugas/{{$data->id}}/edit" class="btn btn-success">Edit</a>
                    <form class=""action="/petugas/{{$data->id}}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <input type="submit" name="" value="delete" class="btn btn-danger">
                    </form>
                    
                </td>
            </tr>
            @empty
            <div class="alert alert-danger">
                Data Kosong!
            </div> 
            @endforelse
        </tbody>
    </table>
    {{$datas->appends(['s'=>$s])->links()}}
</div>
@endsection