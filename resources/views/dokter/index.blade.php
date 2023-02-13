@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    @include('dokter.navbardata')
    <br>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Id Dokter</th>
                <th>Nama Pasien</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>No Telepon</th>
                <th>SIP</th>
                <th>Spesialis</th>
                <th>Alamat</th>
                <th>Pilihan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($datas as $data)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$data->id_dokter}}</td>
                <td>{{$data->nm_dokter}}</td>
                <td>{{$data->jenis_kelamin}}</td>
                <td>{{$data->tanggal_lahir}}</td>
                <td>{{$data->no_telepon}}</td>
                <td>{{$data->sip}}</td>
                <td>{{$data->spesialis}}</td>
                <td>{{$data->alamat}}</td>
                <td style="display:flex; justify-content:space-between;">
                    <a href="/dokter/{{$data->id_dokter}}/edit" class="btn btn-success">Edit</a>
                    <form class=""action="/dokter/{{$data->id_dokter}}" method="post">
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