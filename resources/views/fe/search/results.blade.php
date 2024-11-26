@extends('fe.index')

@section('title', 'search')

@section('main')

    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 mb-4">
                    <h2 class="h5 section-title">Kết Quả Tìm Kiếm</h2>
                </div>

                @if ($products->isEmpty())
                    <p>Không tìm thấy bài viết nào.</p>
                @else
                    <div class="col-lg-10">

                        @foreach ($products as $item)
                            <article class="card mb-4">
                                <div class="row card-body">
                                    <div class="col-md-4 mb-4 mb-md-0">
                                        <div class="post-slider slider-sm">
                                            <img src="{{ asset('storage/images') }}/{{ $item->image }}" class="card-img"
                                                alt="post-thumb" style="height:200px; object-fit: cover;">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h3 class="h4 mb-3"><a class="post-title"
                                                href="{{ route('detail', $item->slug) }}">{{ $item->name }}</a>
                                        </h3>
                                        <ul class="card-meta list-inline">
                                            <li class="list-inline-item">
                                                <i
                                                    class="ti-calendar"></i>{{ \Carbon\Carbon::parse($item->created_at)->format('d M, Y') }}
                                            </li>
                                            <li class="list-inline-item">
                                                <i class="ti-tag"></i>{{ $item->category->name }}
                                            </li>
                                        </ul>
                                        <p> {{ $item->tomtat }}</p>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
