@extends('layouts.app')

@section('content')

<div class="container">
    <br>
    @include('tindakan.navbardata')
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
                <td style="display:flex; justify-content:space-between;">
                    <a href="/tindakan/{{$data->kd_tindakan}}/edit" class="btn btn-success">Edit</a>
                    <form class=""action="/tindakan/{{$data->kd_tindakan}}" method="post">
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