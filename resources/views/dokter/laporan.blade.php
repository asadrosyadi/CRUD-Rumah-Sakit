@extends('layouts.app')

@section('content')

<div class="container">
    <br>
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