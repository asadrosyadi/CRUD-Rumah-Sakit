@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <form class="form-group" action="/rawatobat/{{$data->no_rawat}}" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
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
            <label for="tgl_obat">Tanggal Obat</label>
            <input type="date" name="tgl_obat" value="{{$data->tgl_obat}}" class="form-control" required>
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="kd_obat">KD Obat</label>
            <select class="form-control" name="kd_obat">
                @foreach($obat as $obat)
                <option value="{{$obat->kd_obat}}">{{$obat->kd_obat}} {{$obat->nm_obat}}</option>
                @endforeach
            </select>
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="aturan_pakai">Aturan Pakai</label>
            <input type="text" name="aturan_pakai" value="{{$data->aturan_pakai}}" class="form-control">
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="id_petugas">ID Petugas</label>
            <input type="text" name="id_petugas" value="{{$data->id_petugas}}" class="form-control" required readonly>
        </div>
<br>
        <div class="row atur-ukuran">
           <a href="/rawatobat/" class="btn btn-success">Kembali</a>
           <input type="reset" value="reset" class="btn btn-danger">
           <input type="submit" value="submit" class="btn btn-primary">
        </div>       
    </form>
</div>
@endsection