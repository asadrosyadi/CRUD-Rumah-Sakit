@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <form class="form-group" action="/dokter/{{$data->id_dokter}}" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}

        <div class="row atur-ukuran">
            <label for="nm_dokter">Nama Dokter</label>
            <input type="text" name="nm_dokter" value="{{$data->nm_dokter}}" class="form-control" required>
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select class="form-control" name="jenis_kelamin">
                <option value="L">L</option>
                <option value="P">P</option>
            </select>
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" value="{{$data->tanggal_lahir}}" class="form-control" required>
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="no_telepon">No Telepon</label>
            <input type="number" name="no_telepon" value="{{$data->no_telepon}}" class="form-control" required>
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="sip">SIP</label>
            <select class="form-control" name="sip">
                <option value="Pagi">pagi</option>
                <option value="siang">siang</option>
                <option value="sore">sore</option>
                <option value="malam">malam</option>
            </select>
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="spesialis">Spesialis</label>
            <input type="text" name="spesialis" value="{{$data->spesialis}}" class="form-control" required>
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" value="{{$data->alamat}}" class="form-control" required>
        </div>
<br>
<br>
        <div class="row atur-ukuran">
           <a href="/dokter/" class="btn btn-success">Kembali</a>
           <input type="reset" value="reset" class="btn btn-danger">
           <input type="submit" value="submit" class="btn btn-primary">
        </div>       
    </form>
</div>
@endsection