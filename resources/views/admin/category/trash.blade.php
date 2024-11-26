@extends('admin.master')

@section('title', 'Thùng Rác')

@section('title-page', 'Những Thứ Đã Xóa')

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
                    <div class="box-tools float-right">
                        {{-- <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div> --}}
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
                                    {{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">LT-Cha</th> --}}
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trạng
                                        thái</th>
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
                                        {{-- <td class="align-middle">{{ $item->parent_id }}</td> --}}
                                        <td class="align-middle">
                                            {!! $item->status
                                                ? '<span class="badge badge-sm bg-gradient-success">Hiển Thị</span>'
                                                : '<span class="badge badge-sm bg-gradient-danger">Ẩn</span>' !!}
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $item->created_at }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <a href="{{ route('category.restore', $item->id) }}"
                                                onclick="return confirm('Xác Nhận Khôi Phục Từ Thùng Rác?')"
                                                class="btn btn-success btn-sm mt-3">
                                                <i class="fa fa-undo"></i> Khôi Phục</a>
                                            <a href="{{ route('category.forceDelete', $item->id) }}"
                                                onclick="return confirm('Chắc Chưa?')" class="btn btn-danger btn-sm mt-3">
                                                <i class="fa fa-trash"></i> Xóa Bỏ</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Chưa Có Dữ Liệu</td>
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
