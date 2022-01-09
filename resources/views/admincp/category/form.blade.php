@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <a href="{{ route('category.index')}}" class="btn btn-success" >liệt kê danh mục</a>
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
                            {!! Form::text('title', isset($category) ? $category->title :'', ['class' => 'form-control', 'placeholder'=>'nhap du lieu', 'id' => 'slug', 'onkeyup' => 'ChangeToSlug()', 'required autocomplete' =>'title'])  !!}
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Slug', [])  !!}
                            {!! Form::text('slug', isset($category) ? $category->slug :'', ['class' => 'form-control', 'placeholder'=>'nhap du lieu', 'id' => 'convert_slug'])  !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description', [])  !!}
                            {!! Form::textarea('description', isset($category) ? $category->description :'', ['style'=> 'resize:none','class' => 'form-control', 'placeholder'=>'nhap du lieu', 'id' => 'description', 'required autocomplete' =>'description'])  !!}
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
        </div>
    </div>
</div>
@endsection
