@extends('admin.layouts.master')
@section('content')
    <h1>
        Add Category
    </h1>
    <a href="{{ route('category.index') }}">Back to all Category</a>

    <div class="card">
        <div class="card-header">

        </div>

        <div class="card-body">
            <form action="{{ route('category.update',['category'=>$category->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input onkeyup="ChangeToSlug();" type="text" id="name" name="name" class="form-control" value="{{ $category->name }}">
                </div>

                <div class="form-group">
                    <label for="email">Slug</label>
                    <input type="text" id="slug" name="slug" class="form-control" value="{{ $category->slug }}">
                </div>

                <div class="form-group">
                    <label for="example-textarea">Description</label>
                    <textarea class="form-control" id="example-textarea" name="description" rows="5">{{ $category->description }}</textarea>
                    <input type="hidden" value="0" id="content" name="content" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password">Parent</label>
                    <select class="custom-select mb-3" name="parent_id">
                        <option value="0">-</option>
                        @foreach($parent as $parent)
                            <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-success">Save and back</button>
            </form>
        </div>
    </div>

    <script language="javascript">
        function ChangeToSlug()
        {
            var title, slug;
            //Lấy text từ thẻ input title
            title = document.getElementById("name").value;
            //Đổi chữ hoa thành chữ thường
            slug = title.toLowerCase();
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
