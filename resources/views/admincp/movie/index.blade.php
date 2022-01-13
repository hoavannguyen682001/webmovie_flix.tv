@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <a href="{{ route('movie.create')}}" class="btn btn-success">Thêm phim</a>
            <table class="table" id="myTable">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Tên phim</th>
                    <!-- <th scope="col">Slug</th> -->
                    <th scope="col">Hot</th>
                    <!-- <th scope="col">Mô tả</th> -->
                    <th scope="col">Thời lượng</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Danh mục</th>
                    <th scope="col">Thể loại</th>
                    <th scope="col">Quốc gia</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Video</th>
                    <th scope="col">Quản lí</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($list as $key => $movie)
                        <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $movie->title }}</td>
                        <!-- <td>{{ $movie->slug }}</td> -->
                        <td>
                            @if($movie->phim_hot == 0)
                            Khong
                            @else
                            Co
                            @endif
                        </td>
                        <!-- <td>{{ $movie->description }}</td> -->
                        <td>{{ $movie->time }}</td>
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
                        <td>{{ $movie->video }}</td>
                        <td>
                            {!! Form::open(['route' => ['movie.destroy', $movie->id], 'method' => 'DELETE', 'width = 120px' ,'onsubmit' => 'return confirm("Bạn có muốn xoá??")']) !!}
                                {!! Form::submit('Xoá', ['class' => 'btn btn-danger']) !!}
                                <a href="{{ route('movie.edit', $movie->id) }}" class="btn btn-warning">Chỉnh sửa</a>
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

