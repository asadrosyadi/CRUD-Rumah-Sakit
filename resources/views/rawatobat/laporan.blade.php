@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <br>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nomor Rawat</th>
                <th>Hasil Diagnosa</th>
                <th>Tanggal Obat</th>
                <th>KD Obat</th>
                <th>Nama Obat</th>
                <th>Harga Modal</th>
                <th>Harga jual</th>
                <th>Jumlah</th>
                <th>Aturan Pakai</th>
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
                <td>{{$data->rawat->hasil_diagnosa}}</td>
                <td>{{$data->tgl_obat}}</td>
                <td>{{$data->kd_obat}}</td>
                <td>{{$data->obat->nm_obat}}</td>
                <td>{{$data->obat->harga_modal}}</td>
                <td>{{$data->obat->harga_jual}}</td>
                <td>{{$data->obat->stok}}</td>
                <td>{{$data->aturan_pakai}}</td>
                <td>{{$data->id_petugas}}</td>
                <td>{{$data->petugas->nm_petugas}}</td>
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