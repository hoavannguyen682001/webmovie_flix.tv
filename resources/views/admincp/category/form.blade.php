@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Quản lý danh mục') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(!isset($category))
                         {!! Form::open(['route' => 'category.store', 'method' => 'POST']) !!}
                    @else
                         {!! Form::open(['route' => ['category.update', $category->id], 'method' => 'PUT']) !!}
                    @endif
                        <div class="form-group">
                            {!! Form::label('title', 'Title', [])  !!}
                            {!! Form::text('title', isset($category) ? $category->title :'', ['class' => 'form-control', 'placeholder'=>'nhap du lieu', 'id' => 'slug', 'onkeyup' => 'ChangeToSlug()'])  !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Slug', [])  !!}
                            {!! Form::text('slug', isset($category) ? $category->slug :'', ['class' => 'form-control', 'placeholder'=>'nhap du lieu', 'id' => 'convert_slug'])  !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description', [])  !!}
                            {!! Form::textarea('description', isset($category) ? $category->description :'', ['style'=> 'resize:none','class' => 'form-control', 'placeholder'=>'nhap du lieu', 'id' => 'description'])  !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Status', [])  !!}
                            {!! Form::select('status', ['1' =>'Hiển thị', '0' =>'Không'],  isset($category) ? $category->status :'', ['class' => 'form-control']) !!}
                        </div>
                        @if(!isset($category))
                            {!! Form::submit('Thêm',['class' =>'btn btn-success'])  !!}
                        @else
                            {!! Form::submit('Cập nhập',['class' =>'btn btn-success'])  !!}
                        @endif
                        {!! Form::close() !!}
                </div>
            </div>
            <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Tên phim</th>
      <th scope="col">Slug</th>
      <th scope="col">Mô tả</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">Quản lí</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    @foreach($list as $key => $category)
      <td>{{ $category->id }}</td>
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
