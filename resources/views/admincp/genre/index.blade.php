@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <a href="{{ route('genre.create')}}" class="btn btn-success" >Thêm thể loại</a>
            <table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Tên phim</th>
      <th scope="col">Slug</th>
      <th scope="col">Mô tả</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">Quản lí</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
    @foreach($list as $key => $genre)
      <td>{{ $key+1 }}</td>
      <td>{{ $genre->title }}</td>
      <td>{{ $genre->slug }}</td>
      <td>{{ $genre->description }}</td>
      <td>
          @if($genre->status)
            Hien thi
          @else
            Khong hien thi
          @endif
      </td>
      <td>
        {!! Form::open(['route' => ['genre.destroy', $genre->id], 'method' => 'DELETE', 'onsubmit' => 'return confirm("Bạn có muốn xoá??")']) !!}
            {!! Form::submit('Xoá', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
      </td>
      <td><a href="{{ route('genre.edit', $genre->id) }}" class="btn btn-warning">Chỉnh sửa</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
        </div>
    </div>
</div>
@endsection
