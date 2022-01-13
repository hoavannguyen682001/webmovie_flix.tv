@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <a href="{{ route('episode.create')}}" class="btn btn-success">Thêm tập phim</a>
            <table class="table" id="myTable">
                <thead>
                    <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên phim</th>
                    <th scope="col">Tập</th>
                    <th scope="col">Slug</th>
                    <th scope="col">URL Video</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $key => $episode)
                        <tr>
                        <td>{{$episode->id}}</td>
                        <td>{{ $episode->movie->title }}</td>
                        <td>{{ $episode->episode }}</td>
                        <td>{{ $episode->slug }}</td>
                        <td>{{ $episode->link }}</td>
                        <td>
                            {!! Form::open(['route' => ['episode.destroy', $episode->id], 'method' => 'DELETE', 'onsubmit' => 'return confirm("Bạn có muốn xoá??")']) !!}
                                {!! Form::submit('Xoá', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                        <td><a href="{{ route('episode.edit', $episode->id) }}" class="btn btn-warning">Chỉnh sửa</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

