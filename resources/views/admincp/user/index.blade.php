@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <a href="{{ route('user.create')}}" class="btn btn-success">Thêm tài khoản</a>
            <table class="table" id="myTable">
                <thead>
                    <tr>
                    <th>STT</th>
                    <th scope="col">Tên người dùng</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Thao tác</th>
                    <tH></tH>
                    </tr>
                </thead>
                <tbody>

                    @foreach($list as $key => $user)
                        <tr>
                        <td>{{ $key }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->password }}</td>
                        <td>
                            {!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'DELETE', 'onsubmit' => 'return confirm("Bạn có muốn xoá??")']) !!}
                                {!! Form::submit('Xoá', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                        <td><a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">Chỉnh sửa</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

