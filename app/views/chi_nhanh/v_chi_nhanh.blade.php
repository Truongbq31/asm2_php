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
                            <h1 class="card-title">Danh Sách Chi Nhánh</h1>

                            <button type="button" name="btn_del" class="btn btn-cyan btn-sm">
                                <a style="color: white" href="{{BASE_URL."add-cn"}}">Thêm Mới</a>
                            </button>

                            <div class="table-responsive">
                                <table style="text-align: center" id="zero_config" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên Chi Nhánh</th>
                                        <th>Hành động</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($chi_nhanh as $cn)
                                        <tr>
                                            <td>{{$cn->id}}</td>
                                            <td>{{$cn->ten_chi_nhanh}}</td>

                                            <td>
                                                <button type="button" name="btn_del" class="btn btn-cyan btn-sm">
                                                    <a style="color: white" href="{{route('edit-cn?id_cn='.$cn->id)}}">Sửa</a>
                                                </button>

                                                <button type="button" name="btn_del" class="btn btn-cyan btn-sm" onclick="return confirm('Chắc chắn xóa?')">
                                                    <a style="color: white" href="{{route('del-cn/').$cn->id}}">Xóa</a>
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
