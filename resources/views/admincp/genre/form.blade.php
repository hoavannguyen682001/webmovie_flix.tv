@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
         <a href="{{ route('genre.index')}}" class="btn btn-success" >Liệt kê thể loại</a>
            <div class="card">
                <div class="card-header">{{ __('Quản lý thể loại') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(!isset($genre))
                         {!! Form::open(['route' => 'genre.store', 'method' => 'POST']) !!}
                    @else
                         {!! Form::open(['route' => ['genre.update', $genre->id], 'method' => 'PUT']) !!}
                    @endif
                    <div class="form-group">
                            {!! Form::label('title', 'Title', [])  !!}
                            {!! Form::text('title', isset($genre) ? $genre->title :'', ['class' => 'form-control', 'placeholder'=>'nhap du lieu', 'id' => 'slug', 'onkeyup' => 'ChangeToSlug()', 'required autocomplete' =>'title'])  !!}
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Slug', [])  !!}
                            {!! Form::text('slug', isset($genre) ? $genre->slug :'', ['class' => 'form-control', 'placeholder'=>'nhap du lieu', 'id' => 'convert_slug'])  !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description', [])  !!}
                            {!! Form::textarea('description', isset($genre) ? $genre->description :'', ['style'=> 'resize:none','class' => 'form-control', 'placeholder'=>'nhap du lieu', 'id' => 'description', 'required autocomplete' =>'description'])  !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Status', [])  !!}
                            {!! Form::select('status', ['1' =>'hien thi', '0' =>'khong'],  isset($genre) ? $genre->status :'', ['class' => 'form-control']) !!}
                        </div>
                        @if(!isset($genre))
                            {!! Form::submit('Thêm',['class' =>'btn btn-success'])  !!}
                        @else
                            {!! Form::submit('Cập nhập',['class' =>'btn btn-success'])  !!}
                        @endif
                        {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
