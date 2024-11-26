@extends('fe.index')

@section('title', 'Liên Hệ')

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
                    <h2 class="h5 section-title">Liên Hệ</h2>
                </div>
                <div class="col-lg-10 mx-auto mb-5">
                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name" >Nhập Name:</label>
                            <input class="form-control" type="text" id="name" name="name" placeholder="Nhập Tên...">
                        </div>
                        <div class="form-group">
                            <label for="email">Nhập Email:</label>
                            <input class="form-control" type="email" id="email" name="email" placeholder="Nhập Email...">
                        </div>
                        <div class="form-group">
                            <label for="message">Nội Dung:</label>
                            <textarea class="form-control" id="message" name="message" placeholder="Nhập Nội Dung..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
