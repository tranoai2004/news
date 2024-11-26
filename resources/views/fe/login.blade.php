@extends('fe.index')

@section('title', 'Đăng Nhập')

@section('main')
    <section class="section pb-0 mb-5">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 mb-4">
                    <h2 class="h5 section-title">Đăng Nhập</h2>
                </div>
                <div class="col-lg-10 mx-auto mb-5">
                    <form method="POST" action="">
                        @csrf
                        <div class="form-group">
                            <label for="email">Nhập Emai:</label>
                            <input type="email" name="email" class="form-control" placeholder="Email...." required>
                        </div>
                        <div class="form-group">
                            <label for="password">Nhập Mật Khẩu</label>
                            <input type="password" name="password" class="form-control" placeholder="Mật Khẩu...." required>
                        </div>
                        <button type="submit" class="btn btn-primary">Đăng Nhập</button>
                        <a href="{{ route('password.request') }}" class="btn btn-primary">Quên Mật Khẩu</a>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
