@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <form class="form-group" action="/obat/{{$data->kd_obat}}" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}

        <div class="row atur-ukuran">
            <label for="nm_obat">Nama Obat</label>
            <input type="text" name="nm_obat" value="{{$data->nm_obat}}" class="form-control" required>
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="harga_modal">Harga Modal</label>
            <input type="number" name="harga_modal" value="{{$data->harga_modal}}" class="form-control" required>
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="harga_jual">Harga Jual</label>
            <input type="number" name="harga_jual" value="{{$data->harga_jual}}" class="form-control" required>
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="stok">Stok</label>
            <input type="number" name="stok" value="{{$data->stok}}" class="form-control" required>
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="keterangan">Keterangan</label>
            <input type="text" name="keterangan" value="{{$data->keterangan}}" class="form-control" required>
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