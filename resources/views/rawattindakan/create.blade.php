@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <form class="form-group" action="/rawattindakan" method="post">
        {{csrf_field()}}
<br>
        <div class="row atur-ukuran">
            <label for="tgl_tindakan">Tanggal Tindakan</label>
            <input type="date" name="tgl_tindakan" value="" class="form-control" required>
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="no_rawat">No Rawat</label>
            <select class="form-control" name="no_rawat">
                @foreach($rawat as $rawat)
                <option value="{{$rawat->no_rawat}}">{{$rawat->no_rawat}} {{$rawat->hasil_diagnosa}}</option>
                @endforeach
            </select>
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
            <label for="id_dokter">ID Dokter</label>
            <select class="form-control" name="id_dokter">
                @foreach($dokter as $dokter)
                <option value="{{$dokter->id_dokter}}">{{$dokter->id_dokter}} {{$dokter->nm_dokter}}</option>
                @endforeach
            </select>
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="keterangan">Keterangan</label>
            <input type="text" name="keterangan" value="" class="form-control">
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="id_petugas">ID Petugas</label>
            <input type="text" name="id_petugas" value="{{Auth::user()->id}}" class="form-control" required readonly>
        </div>
<br>
<br>
        <div class="row atur-ukuran">
           <a href="/rawattindakan/" class="btn btn-success">Kembali</a>
           <input type="reset" value="reset" class="btn btn-danger">
           <input type="submit" value="submit" class="btn btn-primary">
        </div>       
    </form>
</div>
@endsection