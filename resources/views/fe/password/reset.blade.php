@extends('fe.index')

@section('title', 'Quên Mật Khẩu')

@section('main')
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 mb-4">
                    <h2 class="h5 section-title">Đặt Lại Mật Khẩu</h2>
                </div>
                <div class="col-lg-8">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group">
                            <label for="email">Nhập Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email') }}" placeholder="Nhập Email..." required>
                        </div>
                        <div class="form-group">
                            <label for="password">Nhập Mật Khẩu</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Nhập Mật Khẩu..." required>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Xác Nhận Mật Khẩu</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" placeholder="Xác Nhận Mật Khẩu" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Đặt Lại</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
