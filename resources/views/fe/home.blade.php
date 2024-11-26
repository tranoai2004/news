@extends('fe.index')

@section('title', 'Trang Chủ')

@section('main')
    <section class="section pb-0 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8  mb-5 mb-lg-0">
                    <h2 class="h5 section-title">Tin Mới Nhất</h2>
                    @foreach ($newProduct as $item)
                        <article class="card mb-4">
                            <div class="card-body">
                                <h3 class="mb-3"><a class="post-title" href="{{route('detail',$item->slug)}}">{{$item->name}}</a></h3>
                                <ul class="card-meta list-inline">
                                    <li class="list-inline-item">
                                        <i class="ti-tag"></i>{{ $item->category->name }}
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="ti-calendar"></i>{{ \Carbon\Carbon::parse($item->created_at)->format('d M, Y') }}
                                    </li>
                                </ul>
                                <p>{{$item->tomtat}}</p>
                            </div>
                        </article>
                    @endforeach



                    {{ $newProduct->links('vendor.pagination.custom-pagination') }} <!-- Phân trang -->

                </div>
                <aside class="col-lg-4 sidebar-home">

                    <!-- recent post -->
                    <div class="widget">
                        <h4 class="widget-title">Tin Tức Nổi Bật</h4>

                        @foreach ($featuredProduct as $item)
                            <article class="widget-card">
                                <div class="d-flex">
                                    <img class="card-img-sm" src="{{ asset('storage/images') }}/{{ $item->image }}">
                                    <div class="ml-3">
                                        <h5><a class="post-title" href="{{route('detail',$item->slug)}}">{{ $item->tomtat }}</a></h5>
                                        <ul class="card-meta list-inline mb-0">
                                            <li class="list-inline-item mb-0">
                                                <i
                                                    class="ti-calendar"></i>{{ \Carbon\Carbon::parse($item->created_at)->format('d M, Y') }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                        <!-- post-item -->



                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection
