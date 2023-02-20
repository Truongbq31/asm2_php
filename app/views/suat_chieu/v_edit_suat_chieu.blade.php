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
                        <form method="POST" action="{{route("post-edit-suat-chieu")}}" enctype="multipart/form-data" class="form-horizontal">
                            <div class="card-body">
                                <h4 class="card-title">Sửa Suất Chiếu</h4>

                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Phim</label>
                                    <div class="col-sm-9">
                                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="id_phim">
                                            <option value="{{$suat_chieu_detail->id_phim}}">{{$suat_chieu_detail->ten_phim}}</option>
                                            @foreach($phim as $value)
                                            <option value="{{$value->id_phim}}">{{$value->ten_phim}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Phòng Chiếu - Chi Nhánh Chiếu</label>
                                    <div class="col-sm-9">
                                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="id_phong_chieu">
                                            <option value="{{$suat_chieu_detail->id_phong_chieu}}"> {{$suat_chieu_detail->ten_phong}} - Chi Nhánh: {{$suat_chieu_detail->ten_chi_nhanh}}</option>
                                            @foreach($phong_chieu as $value)
                                            <option value="{{$value->id_pc}}"> {{$value->ten_phong}} - Chi Nhánh: {{$value->ten_chi_nhanh}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" name="btn_save" class="btn btn-primary">Lưu</button>
                                        <a href="{{route("list-suat-chieu")}}" type="submit" name="btn-submit" class="btn btn-primary">Danh sách</a>
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

