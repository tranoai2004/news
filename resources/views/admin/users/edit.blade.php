@extends('admin.master')

@section('title', 'Cập Nhật')

@section('title-page', 'Cập Nhật Người Dùng')

@section('main-content')
    <!-- Main content -->
    <section class="container">

        <!-- Default box -->
        <div class="col-md-10">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Cập Nhật Người Dùng: {{$user->name}}</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{ route('users.update', $user) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Nhập Tên:</label>
                            <input type="text" name="name" class="form-control" required value="{{ old('name', $user->name) }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Nhập Email:</label>
                            <input type="email" name="email" class="form-control" required value="{{ old('email', $user->email) }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Nhập Mật Khẩu</label>
                            <input type="password" name="password" class="form-control">
                            <small class="form-text text-muted">Để trống nếu không muốn thay đổi mật khẩu.</small>
                        </div>
                        <div class="form-group">
                            <label for="role">Quyền</label>
                            <select name="role" id="role" class="form-control" required>
                                <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Cập Nhật</button>
                    </div>
                </form>
            </div>

            <!-- /.box -->

        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection