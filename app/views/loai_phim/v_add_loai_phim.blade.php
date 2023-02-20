@extends('layout.main')
@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <form method="POST" action="{{BASE_URL."post-add-loai"}}" enctype="multipart/form-data" class="form-horizontal">
                    <div class="card-body">
                        <h4 class="card-title">Thêm Thể Loại Phim</h4>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Tên Loại</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="ten_loai" name="ten_loai" placeholder="" required>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" name="btn_add" class="btn btn-primary">Thêm</button>
                                <a href="{{route('list-loai-phim')}}" type="submit" name="btn-submit" class="btn btn-primary">Danh sách</a>
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

