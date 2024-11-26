@extends('fe.index')

@section('title', 'Quên Mật Khẩu')

@section('main')
    <section class="section">
        <div class="container">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <h4>{{ $error }}</h4>
                    @endforeach
                </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-lg-10 mb-4">
                    <h2 class="h5 section-title">Quên Mật Khẩu</h2>
                </div>
                <div class="col-lg-8">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Nhập Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Nhập Email..." required>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi Liên Kết Đặt Mật Khẩu</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
