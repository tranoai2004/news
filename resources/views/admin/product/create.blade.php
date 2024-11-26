@extends('admin.master')

@section('title', 'Thêm Mới')

@section('title-page', 'Thêm Mới Bài Viết')

@section('main-content')
    <!-- Main content -->
    <section class="container">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Thêm mới Bài Viết</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="box-body col-md-6">
                    <div class="form-group @error('name') has-error @enderror">
                        <label for="exampleInputEmail1">Tên Loại Tin</label>
                        <input type="tetx" class="form-control" id="productName"name='name' onkeyup='ChangeToSlug()'>
                        @error('name')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group @error('name') has-error @enderror">
                        <label for="exampleInputEmail1">Tóm tắt</label>
                        <input type="tetx" class="form-control" id="productName"name='tomtat'>
                        @error('name')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group @error('name') has-error @enderror">
                        <label for="exampleInputEmail1">Slug</label>
                        <input type="tetx" class="form-control" id="slug"name='slug'>
                        @error('name')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group @error('name') has-error @enderror">
                        <label for="exampleInputEmail1">Hình Ảnh</label>
                        <input type="file" class="form-control" id="exampleInputEmail1"name='photo'>
                        @error('name')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- <div class="form-group @error('name') has-error @enderror">
                        <label for="exampleInputEmail1">Hình Ảnh Mô Tả</label>
                        <input type="file" class="form-control" id="exampleInputEmail1"name='photos'>
                        @error('name')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div> --}}

                    <div class="form-group">
                        <label for="parent_id">Chọn Loại Tin</label>
                        <select name="category_id" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="stock" value="1"> Feature
                            </label>
                        </div>
                    </div>

                </div>

                <div class="box-body col-md-6">

                    <div class="form-group">
                        <label for="editor">Content</label>
                        <textarea name="description" id="editor" class="form-control"></textarea>
                    </div>


                </div>
                <!-- /.box-body -->

                <div class="box-footer mt-3">
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                </div>
            </form>
        </div>

        <!-- /.box -->

    </section>
    <!-- /.content -->

    </section>
@endsection


@section('custom-js')
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>

    <script language="javascript">
        function ChangeToSlug() {
            var productName, slug;

            //Lấy text từ thẻ input title
            productName = document.getElementById("productName").value;

            //Đổi chữ hoa thành chữ thường
            slug = productName.toLowerCase();

            //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            //Xóa các ký tự đặt biệt
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            //Đổi khoảng trắng thành ký tự gạch ngang
            slug = slug.replace(/ /gi, "-");
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            //Xóa các ký tự gạch ngang ở đầu và cuối
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            //In slug ra textbox có id “slug”
            document.getElementById('slug').value = slug;
        }
    </script>
@endsection
