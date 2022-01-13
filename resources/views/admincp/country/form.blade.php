@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <a href="{{ route('country.index')}}" class="btn btn-success" >liệt kê quốc gia</a>
            <div class="card">
                <div class="card-header">{{ __('Quản lý quốc gia') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(!isset($country))
                         {!! Form::open(['route' => 'country.store', 'method' => 'POST']) !!}
                    @else
                         {!! Form::open(['route' => ['country.update', $country->id], 'method' => 'PUT']) !!}
                    @endif
                    <div class="form-group">
                            {!! Form::label('title', 'Tên quốc gia', [])  !!}
                            {!! Form::text('title', isset($country) ? $country->title :'', ['class' => 'form-control', 'placeholder'=>'nhap du lieu', 'id' => 'slug', 'onkeyup' => 'ChangeToSlug()',  'required autocomplete' =>'title'])  !!}
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Slug', [])  !!}
                            {!! Form::text('slug', isset($country) ? $country->slug :'', ['class' => 'form-control', 'placeholder'=>'nhap du lieu', 'id' => 'convert_slug'])  !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Mô tả', [])  !!}
                            {!! Form::textarea('description', isset($country) ? $country->description :'', ['style'=> 'resize:none','class' => 'form-control', 'readonly','placeholder'=>'nhap du lieu', 'id' => 'description',  'required autocomplete' =>'description'])  !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Trạng thái', [])  !!}
                            {!! Form::select('status', ['1' =>'hien thi', '0' =>'khong'],  isset($country) ? $country->status :'', ['class' => 'form-control']) !!}
                        </div>
                        @if(!isset($country))
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
