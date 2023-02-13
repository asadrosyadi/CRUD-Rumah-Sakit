@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <form class="form-group" action="/tindakan/{{$data->kd_tindakan}}" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}

        <div class="row atur-ukuran">
            <label for="nm_tindakan">Nama Tindakan</label>
            <input type="text" name="nm_tindakan" value="{{$data->nm_tindakan}}" class="form-control" required>
        </div>
<br>
        <div class="row atur-ukuran">
            <label for="harga">harga</label>
            <input type="number" name="harga" value="{{$data->harga}}" class="form-control" required>
        </div>
<br>
        <div class="row atur-ukuran">
           <a href="/tindakan/" class="btn btn-success">Kembali</a>
           <input type="reset" value="reset" class="btn btn-danger">
           <input type="submit" value="submit" class="btn btn-primary">
        </div>       
    </form>
</div>
@endsection