@extends('admin.master')

@section('title', 'Danh Sách')

@section('title-page', 'Danh Sách Loại Tin')

@section('main-content')
    <section class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible">
                {{ $message }}
            </div>
        @endif
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <a href="{{ route('category.create') }}" class="btn btn-success btn-sm">+Thêm mới Loại Tin</a>
                    <a href="{{ route('category.trash') }}" class="btn btn-primary btn-sm"><i class="fa fa-trash"></i> Thùng Rác</a>
                    <div class="box-tools float-right">
                        <form action="{{ route('category.index') }}" method="GET">
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
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tên
                                        Loại Tin</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Trạng thái</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Ngày tạo</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $item)
                                    <tr>
                                        <td class="align-middle">{{ $loop->iteration }}</td>
                                        <td class="align-middle">{{ $item->name }}</td>
                                        <td class="align-middle text-center text-sm">
                                            {!! $item->status
                                                ? '<span class="badge badge-sm bg-gradient-success">Hiển Thị</span>'
                                                : '<span class="badge badge-sm bg-gradient-danger">Ẩn</span>' !!}
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $item->created_at }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <a href="{{ route('category.edit', $item) }}"
                                                class="btn btn-success btn-sm mt-3" data-toggle="tooltip"
                                                data-original-title="Edit user">
                                                <i class="fa fa-pencil"> Chỉnh Sửa</i>
                                            </a>
                                            <form action="{{ route('category.destroy', $item) }}" method="POST"
                                                style="display:inline;">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm mt-3"
                                                    onclick="return confirm('Bạn Chắc Muốn Xóa?')">
                                                    <i class="fa fa-trash"> Xoá</i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">
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

@endsection
