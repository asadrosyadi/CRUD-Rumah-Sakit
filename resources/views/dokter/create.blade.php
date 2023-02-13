@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <form class="form-group" action="/dokter" method="post">
        {{csrf_field()}}

        <div class="row atur-ukuran">
            <label for="nm_dokter">Nama Dokter</label>
            <input type="text" name="nm_dokter" value="" class="form-control" required>
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
            <input type="date" name="tanggal_lahir" value="" class="form-control" required>
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="no_telepon">No Telepon</label>
            <input type="number" name="no_telepon" value="" class="form-control" required>
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="sip">SIP</label>
            <select class="form-control" name="sip">
                <option value="Pagi">Pagi</option>
                <option value="Siang">Siang</option>
                <option value="Sore">Sore</option>
                <option value="Malam">Malam</option>
            </select>
        </div>
<br>        
        <div class="row atur-ukuran">
            <label for="spesialis">Spesialis</label>
            <input type="text" name="spesialis" value="" class="form-control" required>
        </div>
<br>     
        <div class="row atur-ukuran">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" value="" class="form-control" required>
        </div>
<br>
        <div class="row atur-ukuran">
           <a href="/dokter/" class="btn btn-success">Kembali</a>
           <input type="reset" value="reset" class="btn btn-danger">
           <input type="submit" value="submit" class="btn btn-primary">
        </div>       
    </form>
</div>
@endsection