@extends("layout.main")
@section("content")
    <div class="page-wrapper">
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <form method="POST" action="{{route('post-add-phim')}}" enctype="multipart/form-data" class="form-horizontal">
                            <div class="card-body">
                                <h4 class="card-title">Thêm Phim</h4>

                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Tên Phim</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="ten_loai" name="ten_phim" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Hình Ảnh</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" id="img" name="img" placeholder="" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Giới Thiệu</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="description" name="description" placeholder="" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Thể Loại</label>
                                    <div class="col-sm-9">
                                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="id_loai_phim">
                                            @foreach($loai_phim as $value)
                                                <option value="{{$value->id}}">{{$value->ten_loai}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" name="btn_add" class="btn btn-primary">Thêm</button>
                                        <a href="{{route('list-phim')}}" type="submit" name="btn-submit" class="btn btn-primary">Danh sách</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            <!-- .right-sidebar -->
            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
        </div>
    </div>
@endsection
