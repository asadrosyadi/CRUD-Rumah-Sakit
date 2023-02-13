@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    @include('rawatpasien.navbardata')
    <br>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nomor Rawat</th>
                <th>Tanggal Rawat</th>
                <th>Nomor RMK</th>
                <th>Nama Pasien</th>
                <th>ID Dokter</th>
                <th>Nama Dokter</th>
                <th>Hasil Diagnosa</th>
                <th>Bayar</th>
                <th>ID Petugas</th>
                <th>Nama Petugas</th>
                <th>Pilihan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($datas as $data)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$data->no_rawat}}</td>
                <td>{{$data->tgl_rawat}}</td>
                <td>{{$data->nomor_rmk}}</td>
                <td>{{$data->pasien->nm_pasien}}</td>
                <td>{{$data->id_dokter}}</td>
                <td>{{$data->dokter->nm_dokter}}</td>
                <td>{{$data->hasil_diagnosa}}</td>
                <td>{{$data->bayar}}</td>
                <td>{{$data->id_petugas}}</td>
                <td>{{$data->petugas->nm_petugas}}</td>
                <td style="display:flex; justify-content:space-between;">
                    <a href="/rawatpasien/{{$data->no_rawat}}/edit" class="btn btn-success">Edit</a>
                    <form class=""action="/rawatpasien/{{$data->no_rawat}}" method="post">
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