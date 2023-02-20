@extends("layout.main")
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <form method="POST" action="{{BASE_URL."post-edit-cn"}}" enctype="multipart/form-data" class="form-horizontal">


                            <div class="card-body">
                                <h4 class="card-title">Sửa Chi Nhánh</h4>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Tên Chi Nhánh</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="ten_tieu_de" name="ten_chi_nhanh" value="{{$cn_detail->ten_chi_nhanh}}">
                                    </div>
                                </div>

                            </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" name="btn_save" class="btn btn-primary">Lưu</button>
                                    <a href="{{route('list-cn')}}" type="submit" class="btn btn-primary">Danh sách</a>
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

