@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <br>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nomor RMK</th>
                <th>Nama Pasien</th>
                <th>No Identitas</th>
                <th>Jenis Kelamin</th>
                <th>Golongan Darah</th>
                <th>Tanggal Lahir</th>
                <th>No Telepon</th>
                <th>Alamat</th>
                <th>Status Nikah</th>
                <th>Pekerjaan</th>
                <th>Pilihan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($datas as $data)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$data->nomor_rmk}}</td>
                <td>{{$data->nm_pasien}}</td>
                <td>{{$data->no_identitas}}</td>
                <td>{{$data->jns_kelamin}}</td>
                <td>{{$data->gol_darah}}</td>
                <td>{{$data->tanggal_lahir}}</td>
                <td>{{$data->no_telepon}}</td>
                <td>{{$data->alamat}}</td>
                <td>{{$data->stts_nikah}}</td>
                <td>{{$data->pekerjaan}}</td>
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