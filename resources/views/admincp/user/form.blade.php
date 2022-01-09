@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <a href="{{ route('user.index')}}" class="btn btn-success" >Liệt kê tài khoản</a>
            <div class="card">
                <div class="card-header">{{ __('Quản lý phim') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(!isset($user))
                         {!! Form::open(['route' => 'user.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    @else
                         {!! Form::open(['route' => ['user.update', $user->id], 'method' => 'PUT']) !!}
                    @endif
                        <div class="form-group">
                            {!! Form::label('name', 'Tên người dùng', [])  !!}
                            {!! Form::text('name', isset($user) ? $user->name :'', ['class' => 'form-control', 'placeholder'=>'nhap du lieu', 'id' => 'slug', 'onkeyup' => 'ChangeToSlug()', 'required autocomplete' =>'name'])  !!}
                        </div>
                        <div class="form-group">
                          {!! Form::label('email', 'Email', [])  !!}
                          {!! Form::text('email', isset($user) ? $user->email :'', ['class' => 'form-control', 'placeholder'=>'nhap du lieu', 'required autocomplete' =>'email'])  !!}
                         </div>
                         @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                         <div class="form-group">
                          {!! Form::label('password', 'Password', [])  !!}
                          {!! Form::text('password', isset($user) ? $user->password :'', ['class' => 'form-control', 'placeholder'=>'nhap du lieu', 'required autocomplete' =>'password', isset($user) ? 'readonly' :''])  !!}
                         </div>
                        @if(!isset($user))
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
