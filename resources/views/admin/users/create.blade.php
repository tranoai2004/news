@extends('admin.master')

@section('title', 'Thêm Mới')

@section('title-page', 'Thêm Mới Người Dùng')

@section('main-content')
    <!-- Main content -->
    <section class="container">

        <!-- Default box -->
        <div class="col-md-10">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Thêm mới Người Dùng</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Nhập Tên:</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Nhập Email:</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Nhập Mật Khẩu</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Xác Nhận Mật Khẩu</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="role">Quền</label>
                            <select name="role" id="role" class="form-control" required>
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm Mới</button>
                    </div>
                </form>
            </div>

            <!-- /.box -->

        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection