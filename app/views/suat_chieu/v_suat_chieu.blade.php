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
                        <h1 class="card-title">Danh Sách Suất Chiếu</h1>
                        <button style="color: whitesmoke" type="button" class="btn btn-cyan btn-sm" onclick="window.location.href='{{route('add-suat-chieu')}}'">Thêm mới</button>

                        <div class="table-responsive">
                            <table style="text-align: center" id="zero_config" class="table table-striped table-bordered">
                                <thead>

                                <tr>
                                    <th>Tên Phim</th>
                                    <th>Ảnh</th>
                                    <th>Thể Loại Phim</th>
                                    <th>Chiếu Tại Chi Nhánh</th>
                                    <th>Phòng Chiếu</th>
                                    <th>Hành động</th>
                                </tr>

                                </thead>

                                <tbody>
                                    @foreach($suat_chieu as $value)
                                    <tr>
                                        <td> {{$value->ten_phim}} </td>
                                        <td>
                                            <img width="100px" src="source/img/{{$value->img}}" alt="">
                                        </td>
                                        <td>{{$value->ten_loai}}</td>
                                        <td>{{$value->ten_chi_nhanh}}</td>
                                        <td>{{$value->ten_phong}}</td>
                                        <td>
                                            <button type="button" name="btn_del" class="btn btn-cyan btn-sm">
                                                <a style="color: white" href="{{route('edit-suat-chieu?id_sc=').$value->id_suat_chieu}}">Sửa</a>
                                            </button>

                                            <button type="button" name="btn_del" class="btn btn-cyan btn-sm" onclick="return confirm('Chắc chắn xóa?')">
                                                <a style="color: white" href="{{route('del-suat-chieu?id_sc=').$value->id_suat_chieu}}">Xóa</a>
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

