@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Quản lý phim') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(!isset($movie))
                         {!! Form::open(['route' => 'movie.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    @else
                         {!! Form::open(['route' => ['movie.update', $movie->id], 'method' => 'PUT',  'enctype' => 'multipart/form-data']) !!}
                    @endif
                    <div class="form-group">
                            {!! Form::label('title', 'Title', [])  !!}
                            {!! Form::text('title', isset($movie) ? $movie->title :'', ['class' => 'form-control', 'placeholder'=>'nhap du lieu', 'id' => 'slug', 'onkeyup' => 'ChangeToSlug()'])  !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Slug', [])  !!}
                            {!! Form::text('slug', isset($movie) ? $movie->slug :'', ['class' => 'form-control', 'placeholder'=>'nhap du lieu', 'id' => 'convert_slug'])  !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description', [])  !!}
                            {!! Form::textarea('description', isset($movie) ? $movie->description :'', ['style'=> 'resize:none','class' => 'form-control', 'placeholder'=>'nhap du lieu', 'id' => 'description'])  !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Status', [])  !!}
                            {!! Form::select('status', ['1' =>'hien thi', '0' =>'khong'],  isset($movie) ? $movie->status :'', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('category', 'Category', [])  !!}
                            {!! Form::select('category_id',$category ,  isset($movie) ? $movie->category_id :'', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('genre', 'Genre', [])  !!}
                            {!! Form::select('genre_id', $genre,  isset($movie) ? $movie->genre_id :'', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('country', 'Country', [])  !!}
                            {!! Form::select('country_id',$country ,  isset($movie) ? $movie->country_id :'', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('image', 'Image', [])  !!}
                            {!! Form::file('image', ['class' => 'form-control-file']) !!}
                            @if(isset($movie))
                                <img width="20%" src="{{asset('uploads/movie/'.$movie->image)  }}">
                            @endif
                        </div>
                        @if(!isset($movie))
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
      <th scope="col">Danh mục</th>
      <th scope="col">Thể loại</th>
      <th scope="col">Quốc gia</th>
      <th scope="col">Hình ảnh</th>
      <th scope="col">Quản lí</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    @foreach($list as $key => $movie)
      <td>{{ $movie->id }}</td>
      <td>{{ $movie->title }}</td>
      <td>{{ $movie->slug }}</td>
      <td>{{ $movie->description }}</td>
      <td>
          @if($movie->status)
            Hien thi
          @else
            Khong hien thi
          @endif
      </td>
      <td>{{ $movie->category->title }}</td>
      <td>{{ $movie->genre->title }}</td>
      <td>{{ $movie->country->title }}</td>
      <td><img width="80%" src="{{asset('uploads/movie/'.$movie->image)  }}"></td>
      <td>
        {!! Form::open(['route' => ['movie.destroy', $movie->id], 'method' => 'DELETE', 'onsubmit' => 'return confirm("Bạn có muốn xoá??")']) !!}
            {!! Form::submit('Xoá', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
      </td>
      <td><a href="{{ route('movie.edit', $movie->id) }}" class="btn btn-warning">Chỉnh sửa</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
        </div>
    </div>
</div>
@endsection
