@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <a href="{{ route('episode.index')}}" class="btn btn-success" >Liệt kê phim</a>
            <div class="card">
                <div class="card-header">{{ __('Quản lý phim') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(!isset($episode))
                         {!! Form::open(['route' => 'episode.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    @else
                         {!! Form::open(['route' => ['episode.update', $episode->id], 'method' => 'PUT',  'enctype' => 'multipart/form-data']) !!}
                    @endif
                    <div class="form-group">
                            {!! Form::label('movie_id', 'Movie', [])  !!}
                            {!! Form::select('movie_id', $movie,  isset($episode) ? $episode->movie_id :'', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('link', 'URL Video', [])  !!}
                            {!! Form::text('link', isset($episode) ? $episode->link :'', ['class' => 'form-control', 'placeholder'=>'nhap du lieu', 'required autocomplete' =>'link'])  !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Slug', [])  !!}
                            {!! Form::text('slug', isset($episode) ? $episode->slug :'', ['class' => 'form-control','readonly', 'placeholder'=>'nhap du lieu', 'id' => 'convert_slug'])  !!}
                        </div>
                        @error('slug')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        <div class="form-group">
                            {!! Form::label('episode', 'Episode', [])  !!}
                            {!! Form::text('episode', isset($episode) ? $episode->episode :'', ['class' => 'form-control', 'placeholder'=>'nhap du lieu', 'required autocomplete' =>'epispde','id' => 'slug', 'onkeyup' => 'ChangeToSlug()'])  !!}
                        </div>
                        @if(!isset($episode))
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
