@extends('admin.master')

@section('title', 'Chỉnh Sửa')

@section('title-page', 'Chỉnh Sửa Loại Tin')

@section('main-content')
    <!-- Main content -->
    <section class="container">

        <!-- Default box -->
        <div class="col-md-5">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Chỉnh Sửa Loại Tin: {{ $category->name }}</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{ route('category.update', $category) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="id" value="{{ $category->id }}">
                    <div class="box-body">
                        <div class="form-group @error('name') has-error @enderror">
                            <label for="exampleInputEmail1">Tên Loại Tin</label>
                            <input type="tetx" class="form-control" id="exampleInputEmail1"name='name'
                                value="{{ old('name') ? old('name') : $category->name }}">
                            @error('name')
                                <span class="help-block">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- <div class="form-group">
                            <label for="exampleInputEmail1">Chọn LT-Cha</label>
                            <select name="parent_id" id="input" class="form-control">
                                <option value="">Chọn LT-Cha</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}" {{ $category->parent_id == $item->id ? 'selected' : ''}}>{{ $item->name }}</option>
                                @endforeach

                            </select>
                        </div> --}}

                        <div class="form-group">
                            <label for="exampleInputEmail1">Chọn trạng thái</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="status" id="input" value="1"
                                        {{ $category->status == 1 ? 'checked' : '' }}>
                                    Hiện
                                </label>
                                <label>
                                    <input type="radio" name="status" id="input" value="0"
                                        {{ $category->status == 0 ? 'checked' : '' }}>
                                    Ẩn
                                </label>
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>

            <!-- /.box -->

        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

    </section>
@endsection
