@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    @include('rawattindakan.navbardata')
    <br>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nomor Tindakan</th>
                <th>Tanggal Tindakan</th>
                <th>Nomor Rawat</th>
                <th>Hasil Diagnosa</th>
                <th>KD Tindakan</th>
                <th>Nama Tindakan</th>
                <th>ID Dokter</th>
                <th>Nama Dokter</th>
                <th>Keterangan</th>
                <th>ID Petugas</th>
                <th>Nama Petugas</th>
                <th>Pilihan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($datas as $data)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$data->no_tindakan}}</td>
                <td>{{$data->tgl_tindakan}}</td>
                <td>{{$data->no_rawat}}</td>
                <td>{{$data->rawat->hasil_diagnosa}}</td>
                <td>{{$data->kd_tindakan}}</td>
                <td>{{$data->tindakan->nm_tindakan}}</td>
                <td>{{$data->id_dokter}}</td>
                <td>{{$data->dokter->nm_dokter}}</td>
                <td>{{$data->keterangan}}</td>
                <td>{{$data->id_petugas}}</td>
                <td>{{$data->petugas->nm_petugas}}</td>
                <td style="display:flex; justify-content:space-between;">
                    <a href="/rawattindakan/{{$data->no_tindakan}}/edit" class="btn btn-success">Edit</a>
                    <form class=""action="/rawattindakan/{{$data->no_tindakan}}" method="post">
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