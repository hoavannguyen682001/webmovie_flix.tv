@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <a href="{{ route('category.create')}}" class="btn btn-success" >Thêm thể danh mục</a>
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
    @foreach($list as $key => $category)
      <td>{{ $key+1 }}</td>
      <td>{{ $category->title }}</td>
      <td>{{ $category->slug }}</td>
      <td>{{ $category->description }}</td>
      <td>
          @if($category->status)
            Hiển thị
          @else
            Không hiển thị
          @endif
      </td>
      <td>
        {!! Form::open(['route' => ['category.destroy', $category->id], 'method' => 'DELETE', 'onsubmit' => 'return confirm("Bạn có muốn xoá??")']) !!}
            {!! Form::submit('Xoá', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
      </td>
      <td><a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning">Chỉnh sửa</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
        </div>
    </div>
</div>
@endsection



