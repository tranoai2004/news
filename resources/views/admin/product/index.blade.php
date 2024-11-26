@extends('admin.master')

@section('title', 'Danh Sách')

@section('title-page', 'Danh Sách Tin')

@section('main-content')
    <section class="container">
        <style>
            .table-responsive td {
                white-space: normal;
                word-wrap: break-word;
                word-break: break-word;
            }
        </style>

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible">
                {{ $message }}
            </div>
        @endif

        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <a href="{{ route('product.create') }}" class="btn btn-success btn-sm">+Thêm mới bài viết</a>
                    {{-- <a href="" class="btn btn-primary btn-sm"><i class="fa fa-trash"></i> Thùng Rác</a> --}}
                    <div class="box-tools float-right">
                        <form action="{{ route('product.index') }}" method="GET">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" class="form-control pull-right" placeholder="Search"
                                    value="{{ request()->search }}">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stt</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Tiêu Đề</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tóm
                                        Tắt</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Hình ảnh</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Danh Mục</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Ngày Tạo</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $item)
                                    <tr>
                                        <td class="align-middle">{{ $loop->iteration }}</td>
                                        <td class="align-middle">{{ $item->name }}</td>
                                        <td class="align-middle">{{ $item->tomtat }}</td>
                                        <td class="align-middle"><img
                                                src="{{ asset('storage/images') }}/{{ $item->image }}" width="150px"></td>
                                        <td class="align-middle">{{ $item->category->name }}</td>
                                        <td class="align-middle text-center text-sm">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $item->created_at }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <a href="{{ route('product.edit', $item) }}"
                                                class="btn btn-success btn-sm" data-toggle="tooltip"
                                                data-original-title="Edit product">
                                                <i class="fa fa-pencil"> Update</i>
                                            </a>
                                            <form action="{{ route('product.destroy', $item) }}" method="POST"
                                                style="display:inline;">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Bạn Chắc Muốn Xóa?')">
                                                    <i class="fa fa-trash"> Delete</i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            <span>Chưa Có Dữ Liệu</span>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{ $products->links() }}


@endsection
