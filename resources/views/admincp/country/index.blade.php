@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <a href="{{ route('country.create')}}" class="btn btn-success" >Thêm thể quốc gia</a>

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
    @foreach($list as $key => $country)
      <td>{{ $country->id }}</td>
      <td>{{ $country->title }}</td>
      <td>{{ $country->slug }}</td>
      <td>{{ $country->description }}</td>
      <td>
          @if($country->status)
            Hien thi
          @else
            Khong hien thi
          @endif
      </td>
      <td>
        {!! Form::open(['route' => ['country.destroy', $country->id], 'method' => 'DELETE', 'onsubmit' => 'return confirm("Bạn có muốn xoá??")']) !!}
            {!! Form::submit('Xoá', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
      </td>
      <td><a href="{{ route('country.edit', $country->id) }}" class="btn btn-warning">Chỉnh sửa</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
        </div>
    </div>
</div>
@endsection
