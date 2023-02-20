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
                                <h1 class="card-title">Danh Sách Phim</h1>
                                <button style="color: whitesmoke" type="button" class="btn btn-cyan btn-sm" onclick="window.location.href='{{route('add-phim')}}'">Thêm mới</button>

                                <div class="table-responsive">
                                    <table style="text-align: center" id="zero_config" class="table table-striped table-bordered">
                                        <thead>

                                        <tr>
                                            <th>Tên Phim</th>
                                            <th>Ảnh</th>
                                            <th>Chi Tiết</th>
                                            <th>Thể Loại Phim</th>
                                            <th>Hành động</th>
                                        </tr>

                                        </thead>

                                        <tbody>
                                        @foreach($phim as $film)
                                            <tr>
                                                <td>{{$film->ten_phim}}</td>
                                                <td>
                                                    <img width="100px" src="source/img/{{$film->img}}">
                                                </td>
                                                <td>{{$film->description}}</td>
                                                <td>{{$film->ten_loai}}</td>

                                                <td>
                                                    <button type="button" name="btn_del" class="btn btn-cyan btn-sm">
                                                        <a style="color: white" href="{{route('edit-phim?id_phim=').$film->id_phim}}">Sửa</a>
                                                    </button>

                                                    <button type="button" name="btn_del" class="btn btn-cyan btn-sm" onclick="return confirm('Chắc chắn xóa?')">
                                                        <a style="color: white" href="{{route('del-phim?id_phim=').$film->id_phim}}">Xóa</a>
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


