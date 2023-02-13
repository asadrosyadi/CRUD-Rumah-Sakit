@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    <br>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>KD Tindakan</th>
                <th>Nama Tindakan</th>
                <th>Harga</th>
                <th>Pilihan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($datas as $data)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$data->kd_tindakan}}</td>
                <td>{{$data->nm_tindakan}}</td>
                <td>{{$data->harga}}</td>
                <td>
                    <a href="#" class="btn btn-success">print</a>
                </td>

            </tr>
            @empty
            <div class="alert alert-danger">
                Data Kosong!
            </div> 
            @endforelse
        </tbody>
    </table>
    {{$datas->links()}}
</div>
@endsection