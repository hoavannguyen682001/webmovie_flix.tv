@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Quan li danh muc') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {!! Form::open(['route' => 'category.store', 'method' => 'POST']) !!}
                        <div class="form-group">
                            {!! Form::label('title', 'Title', [])  !!}
                            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder'=>'nhap du lieu', 'id' => 'title'])  !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description', [])  !!}
                            {!! Form::textarea('description', null, ['style'=> 'resize:none','class' => 'form-control', 'placeholder'=>'nhap du lieu', 'id' => 'description'])  !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description', [])  !!}
                            {!! Form::select('status', ['1' =>'hien thi', '0' =>'khong'], null, ['class' => 'form-control']) !!}
                        </div>
                        {!! Form::submit('Them du lieu',['class' =>'btn btn-success'])  !!}
                    {!! Form::close() !!}
                </div>
            </div>
            <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Tên phim</th>
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
      <td>{{ $category->description }}</td>
      <td>
          @if($category->status)
            Hien thi
          @else
            Khong hien thi
          @endif
      </td>
      <td>
        {!! Form::open(['route' => ['category.destroy', $category->id], 'method' => 'DELETE', 'onsubmit' => 'return confirm("Bạn có muốn xoá??")']) !!}
            {!! Form::submit('Xoá', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
        </div>
    </div>
</div>
@endsection
