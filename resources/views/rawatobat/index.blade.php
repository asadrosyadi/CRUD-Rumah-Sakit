@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    @include('rawatobat.navbardata')
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
                <td style="display:flex; justify-content:space-between;">
                    <a href="/rawatobat/{{$data->no_rawat}}/edit" class="btn btn-success">Edit</a>
                    <form class=""action="/rawatobat/{{$data->no_rawat}}" method="post">
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