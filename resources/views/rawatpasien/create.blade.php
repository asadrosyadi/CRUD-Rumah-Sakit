@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <form class="form-group" action="/rawatpasien" method="post">
        {{csrf_field()}}
<br>
        <div class="row atur-ukuran">
            <label for="tgl_rawat">Tanggal Daftar</label>
            <input type="date" name="tgl_rawat" value="" class="form-control" required>
        </div>
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
            <label for="id_dokter">ID Dokter</label>
            <select class="form-control" name="id_dokter">
                @foreach($dokter as $dokter)
                <option value="{{$dokter->id_dokter}}">{{$dokter->id_dokter}} {{$dokter->nm_dokter}}</option>
                @endforeach
            </select>
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="hasil_diagnosa">Hasil Diagnosa</label>
            <input type="text" name="hasil_diagnosa" value="" class="form-control">
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="bayar">Bayar</label>
            <input type="number" name="bayar" value="" class="form-control">
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="id_petugas">ID Petugas</label>
            <input type="text" name="id_petugas" value="{{Auth::user()->id}}" class="form-control" required readonly>
        </div>
<br>
<br>
        <div class="row atur-ukuran">
           <a href="/rawatpasien/" class="btn btn-success">Kembali</a>
           <input type="reset" value="reset" class="btn btn-danger">
           <input type="submit" value="submit" class="btn btn-primary">
        </div>       
    </form>
</div>
@endsection