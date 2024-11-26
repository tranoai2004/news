<?php
    $loaitin = DB::table('categories')
    ->select('id', 'name')
    ->get();
?>
<header class="navigation fixed-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="{{ route('index') }}">
                <img class="img-fluid" width="100px" src="/client/images/logo.png" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index') }}">Trang Chủ</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="newsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Tin Tức
                        </a>
                        <div class="dropdown-menu" aria-labelledby="newsDropdown">
                            @foreach ($loaitin as $item)
                                <a class="dropdown-item" href="{{ route('result', $item->id) }}">{{ $item->name }}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact.show') }}">Liên Hệ</a>
                    </li>
                </ul>
                <form class="form-inline ml-auto" action="{{ route('search') }}" method="GET">
                    <input id="search-query" name="s" class="form-control mr-sm-2" type="search" placeholder="Tìm Kiếm" aria-label="Search" value="{{ request()->s }}">
                </form>
                <ul class="navbar-nav ms-auto">
                    @if (auth()->check())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-right"></i> Đăng Xuất
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="btn btn-outline-primary me-2" href="{{ route('login') }}">
                                <i class="bi bi-box-arrow-in-right"></i> Đăng Nhập
                            </a>
                            <a class="btn btn-primary" href="{{ route('register') }}">
                                <i class="bi bi-person-plus"></i> Đăng Kí
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>

