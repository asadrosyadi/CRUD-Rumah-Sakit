@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    @include('obat.navbardata')
    <br>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>KD Obat</th>
                <th>Nama Obat</th>
                <th>Harga Modal</th>
                <th>Harga Jual</th>
                <th>Stok</th>
                <th>Keterangan</th>
                <th>Pilihan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($datas as $data)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$data->kd_obat}}</td>
                <td>{{$data->nm_obat}}</td>
                <td>{{$data->harga_modal}}</td>
                <td>{{$data->harga_jual}}</td>
                <td>{{$data->stok}}</td>
                <td>{{$data->keterangan}}</td>
                <td style="display:flex; justify-content:space-between;">
                    <a href="/obat/{{$data->kd_obat}}/edit" class="btn btn-success">Edit</a>
                    <form class=""action="/obat/{{$data->kd_obat}}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <input type="submit" name="" value="delete" class="btn btn-danger">
                    </form>
                    
                </td>
            </tr>
            @empty
            <div class="alert alert-danger">
                Data Kosong!
            </div> 
            @endforelse
        </tbody>
    </table>
    {{$datas->appends(['s'=>$s])->links()}}
</div>
@endsection