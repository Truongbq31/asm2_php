@extends("layout.main")
@section("content")
    @isset($_GET['file-error'])
        <script>alert("Đuôi file không được phép upload!")</script>
    @endisset
    <div class="page-wrapper">
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
{{--                        @foreach($phim_detail as $value)--}}
                            <form method="POST" action="{{route("post-edit-phim")}}" enctype="multipart/form-data" class="form-horizontal">
                            <div class="card-body">
                                <h4 class="card-title">Sửa Phim</h4>

                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Tên Phim</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="ten_loai" name="ten_phim" required value="{{$phim_detail->ten_phim}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Hình Ảnh</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" id="img" name="img">
                                        <img width="100px" src="source/img/{{$phim_detail->img}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Giới Thiệu</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="description" name="description" value="{{$phim_detail->description}}" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Thể Loại</label>
                                    <div class="col-sm-9">
                                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="id_loai_phim">
                                            <option value="{{$phim_detail->id_loai_phim}}"> {{$phim_detail->ten_loai}} </option>
                                            @foreach($loai_phim as $type)
                                                <option value="{{$type->id}}">{{$type->ten_loai}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" name="btn_save" class="btn btn-primary">Lưu</button>
                                        <a href="{{route('list-phim')}}" type="submit" name="btn-submit" class="btn btn-primary">Danh sách</a>
                                    </div>
                                </div>

                            </div>
                        </form>
{{--                        @endforeach--}}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
