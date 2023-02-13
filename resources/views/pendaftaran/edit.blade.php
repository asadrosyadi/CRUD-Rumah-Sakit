@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <form class="form-group" action="/pendaftaran/{{$data->no_daftar}}" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}

        <br>
        <div class="row atur-ukuran">
            <label for="nomor_rmk">No RMK</label>
            <select class="form-control" name="nomor_rmk">
                @foreach($pasien as $pasien)
                <option value="{{$pasien->nomor_rmk}}">{{$pasien->nomor_rmk}} {{$pasien->nm_pasien}}</option>
                @endforeach
            </select>
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="tgl_daftar">Tanggal Daftar</label>
            <input type="date" name="tgl_daftar" value="{{$data->tgl_daftar}}" class="form-control" required>
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="keluhan">Keluhan</label>
            <input type="text" name="keluhan" value="{{$data->keluhan}}" class="form-control" required>
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="kd_tindakan">KD Tindakan</label>
            <select class="form-control" name="kd_tindakan">
                @foreach($tindakan as $tindakan)
                <option value="{{$tindakan->kd_tindakan}}">{{$tindakan->kd_tindakan}} {{$tindakan->nm_tindakan}}</option>
                @endforeach
            </select>
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="nomor_antri">Nomor Antri</label>
            <input type="number" name="nomor_antri" value="{{$data->nomor_antri}}" class="form-control" required>
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="id_petugas">ID Petugas</label>
            <input type="text" name="id_petugas" value="{{$data->id_petugas}}" class="form-control" required readonly>
        </div>
<br>
<br>
        <div class="row atur-ukuran">
           <a href="/pendaftaran/" class="btn btn-success">Kembali</a>
           <input type="reset" value="reset" class="btn btn-danger">
           <input type="submit" value="submit" class="btn btn-primary">
        </div>       
    </form>
</div>
@endsection