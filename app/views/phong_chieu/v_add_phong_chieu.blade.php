@extends("layout.main")
@section("content")
    @isset($_GET['room-error'])
        <script>alert(`Phòng đã có tại chi nhánh!`)</script>
    @endisset
    <div class="page-wrapper">
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <form method="POST" action="{{BASE_URL."post-add-phong"}}" enctype="multipart/form-data" class="form-horizontal">
                            <div class="card-body">
                                <h4 class="card-title">Thêm Phòng Chiếu</h4>

                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Tên Phòng</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="ten_loai" name="ten_phong" placeholder="" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Thêm Vào Chi Nhánh</label>
                                    <div class="col-sm-9">
                                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="id_chi_nhanh">
                                            @foreach($chi_nhanh as $value)
                                                <option value="{{$value->id}}">{{$value->ten_chi_nhanh}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" name="btn_add" class="btn btn-primary">Thêm</button>
                                        <a href="{{route('list-pc')}}" type="submit" name="btn-submit" class="btn btn-primary">Danh sách</a>
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
