@extends('fe.index')

@section('title', 'Chi Tiết')

@section('main')
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class=" col-lg-9   mb-5 mb-lg-0">
                    <article>
                        <div class="post-slider mb-4">
                            <img src="{{ asset('storage/images') }}/{{ $product->image }}" class="card-img" alt="post-thumb">
                        </div>

                        <h1 class="h2">{{ $product->name }}</h1>
                        <ul class="card-meta my-3 list-inline">
                            <li class="list-inline-item">
                                <i
                                    class="ti-calendar"></i>{{ \Carbon\Carbon::parse($product->created_at)->format('d M, Y') }}
                            </li>
                            <li class="list-inline-item">
                                <i class="ti-tag"></i>{{ $product->category->name }}
                            </li>
                            <li class="list-inline-item">
                                <i class="ti-user"></i>{{ $product->author->name ?? 'Không xác định' }}
                            </li>
                        </ul>
                        <div class="content">
                            <p>{!! $product->description !!}</p>
                        </div>
                    </article>


                </div>

                {{-- <div class="col-lg-9 col-md-12">
                    <div class="mb-5 border-top mt-4 pt-5">
                        <h3 class="mb-4">Bình Luận</h3>

                        @foreach ($product->comments as $comment)
                            <div class="media d-block d-sm-flex mb-4 pb-4">
                                <a class="d-inline-block mr-2 mb-3 mb-md-0" href="#">
                                    <img src="path/to/user/avatar.jpg" class="mr-3 rounded-circle" alt="">
                                </a>
                                <div class="media-body">
                                    <a href="#!" class="h4 d-inline-block mb-3">{{ $comment->user->name }}</a>
                                    <p>{{ $comment->content }}</p>
                                    <span
                                        class="text-black-800 mr-3 font-weight-600">{{ $comment->created_at->format('F d, Y \a\t h:i a') }}</span>
                                    <a class="text-primary font-weight-600" href="#!">Trả Lời</a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div>
                        <h3 class="mb-4">Để lại một câu trả lời:</h3>
                        @auth
                            <form action="{{ route('comments.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <textarea class="form-control shadow-none" name="content" rows="7" required placeholder="Nhập Bình Luận..."></textarea>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Bình Luận</button>
                                </div>
                            </form>
                        @endauth

                        @guest
                            <p>Bạn cần <a href="{{ route('login') }}">đăng nhập</a> để viết bình luận.</p>
                        @endguest
                    </div>
                </div> --}}

            </div>
        </div>
    </section>
@endsection
