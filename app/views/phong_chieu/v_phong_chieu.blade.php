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
                        <h1 class="card-title">Danh Sách Phòng Chiếu</h1>

                        <button type="button" name="btn_del" class="btn btn-cyan btn-sm">
                            <a style="color: white" href="{{route('add-pc')}}">Thêm Mới</a>
                        </button>

                        <div class="table-responsive">
                            <table style="text-align: center" id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên Phòng</th>
                                    <th>Thuộc Chi Nhánh</th>
                                    <th>Hành động</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($phong_chieu as $value)
                                    <tr>
                                        <td><?php echo $value->id_pc; ?></td>
                                        <td><?php echo $value->ten_phong; ?></td>
                                        <td><?php echo $value->ten_chi_nhanh; ?></td>

                                        <td>
                                            <button type="button" name="btn_del" class="btn btn-cyan btn-sm">
                                                <a style="color: white" href="{{route('edit-pc?id_pc=').$value->id_pc}}">Sửa</a>
                                            </button>

                                            <button type="button" name="btn_del" class="btn btn-cyan btn-sm" onclick="return confirm('Chắc chắn xóa?')">
                                                <a style="color: white" href="{{route('del-pc/'.$value->id_pc)}}">Xóa</a>
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


