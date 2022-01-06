@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <a href="{{ route('movie.index')}}" class="btn btn-success" >Liệt kê phim</a>
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
                          {!! Form::label('Name English', 'Name English', [])  !!}
                          {!! Form::text('name_eng', isset($movie) ? $movie->name_eng :'', ['class' => 'form-control', 'placeholder'=>'nhap du lieu'])  !!}
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
                            {!! Form::label('Hot', 'Hot', [])  !!}
                            {!! Form::select('phim_hot', ['1' =>'Co', '0' =>'khong'],  isset($movie) ? $movie->phim_hot :'', ['class' => 'form-control']) !!}
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
                            @endif <br>
                            {!! Form::label('video', 'Video', [])  !!}
                            {!! Form::file('video', ['class' => 'form-control-file']) !!}
                            @if(isset($movie))
                                <img width="20%" src="{{asset('uploads/video/'.$movie->video)  }}">
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

        </div>
    </div>
</div>
@endsection
