@extends("layout.main")
@section("content")
    <div class="page-wrapper">
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title">Danh Sách Thể Loại Phim</h1>

                            <button type="button" name="btn_del" class="btn btn-cyan btn-sm">
                                <a style="color: white" href="{{route("add-loai-phim")}}">Thêm Mới</a>
                            </button>

                            <div class="table-responsive">
                                <table style="text-align: center" id="zero_config" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên Loại</th>
                                        <th>Hành động</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($loai_phim as $type)

                                        <tr>
                                            <td>{{$type->id}}</td>
                                            <td>{{$type->ten_loai}}</td>

                                            <td>
                                                <button type="button" name="btn_del" class="btn btn-cyan btn-sm">
                                                    <a style="color: white" href="{{route('edit-loai-phim?id_loai=').$type->id}}">Sửa</a>
                                                </button>

                                                <button type="button" name="btn_del" class="btn btn-cyan btn-sm" onclick="return confirm('Chắc chắn xóa?')">
                                                    <a style="color: white" href="{{route('del-loai-phim/').$type->id}}">Xóa</a>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

