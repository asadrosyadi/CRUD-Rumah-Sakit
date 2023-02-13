@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <form class="form-group" action="/obat" method="post">
        {{csrf_field()}}

        <div class="row atur-ukuran">
            <label for="nm_obat">Nama Obat</label>
            <input type="text" name="nm_obat" value="" class="form-control" required>
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="harga_modal">harga Modal</label>
            <input type="number" name="harga_modal" value="" class="form-control" required>
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="harga_jual">harga Jual</label>
            <input type="number" name="harga_jual" value="" class="form-control" required>
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="stok">Stok</label>
            <input type="number" name="stok" value="" class="form-control" required>
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="keterangan">Keterangan</label>
            <input type="text" name="keterangan" value="" class="form-control" required>
        </div>
<br>
        <div class="row atur-ukuran">
           <a href="/obat/" class="btn btn-success">Kembali</a>
           <input type="reset" value="reset" class="btn btn-danger">
           <input type="submit" value="submit" class="btn btn-primary">
        </div>       
    </form>
</div>
@endsection