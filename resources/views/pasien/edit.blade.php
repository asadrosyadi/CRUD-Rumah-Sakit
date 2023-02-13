@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <form class="form-group" action="/pasien/{{$data->nomor_rmk}}" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}

        <div class="row atur-ukuran">
            <label for="nm_pasien">Nama Pasien</label>
            <input type="text" name="nm_pasien" value="{{$data->nm_pasien}}" class="form-control" required>
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="nm_pasien">No Identitas</label>
            <input type="number" name="no_identitas" value="{{$data->no_identitas}}" class="form-control" required>
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="jns_kelamin">Jenis Kelamin</label>
            <select class="form-control" name="jns_kelamin">
                <option value="L">L</option>
                <option value="P">P</option>
            </select>
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="gol_darah">Gologan Darah</label>
            <select class="form-control" name="gol_darah">
                <option value="O">O</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="AB">AB</option>
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
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" value="{{$data->alamat}}" class="form-control" required>
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="stts_nikah">Status Nikah</label>
            <select class="form-control" name="stts_nikah">
                <option value="Sudah">Sudah</option>
                <option value="Belum">Belum</option>
            </select>
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="pekerjaan">Pekerjaan</label>
            <input type="text" name="pekerjaan" value="{{$data->pekerjaan}}" class="form-control" required>
        </div>
<br>
<br>
        <div class="row atur-ukuran">
           <a href="/pasien/" class="btn btn-success">Kembali</a>
           <input type="reset" value="reset" class="btn btn-danger">
           <input type="submit" value="submit" class="btn btn-primary">
        </div>       
    </form>
</div>
@endsection