@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    @include('pendaftaran.navbardata')
    <br>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nomor Daftar</th>
                <th>Nomor RMK</th>
                <th>Nama pasien</th>
                <th>Tanggal Daftar</th>
                <th>Keluhan</th>
                <th>KD Tindakan</th>
                <th>Nama Tindakan</th>
                <th>Nomor Antri</th>
                <th>ID Petugas</th>
                <th>Nama Petugas</th>
                <th>Pilihan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($datas as $data)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$data->no_daftar}}</td>
                <td>{{$data->nomor_rmk}}</td>
                <td>{{$data->pasien->nm_pasien}}</td>
                <td>{{$data->tgl_daftar}}</td>
                <td>{{$data->keluhan}}</td>
                <td>{{$data->kd_tindakan}}</td>
                <td>{{$data->tindakan->nm_tindakan}}</td>
                <td>{{$data->nomor_antri}}</td>
                <td>{{$data->id_petugas}}</td>
                <td>{{$data->petugas->nm_petugas}}</td>
                <td style="display:flex; justify-content:space-between;">
                    <a href="/pendaftaran/{{$data->no_daftar}}/edit" class="btn btn-success">Edit</a>
                    <form class=""action="/pendaftaran/{{$data->no_daftar}}" method="post">
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