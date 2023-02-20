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
                            <h1 class="card-title">Danh Sách Tài Khoản</h1>
                            <div class="table-responsive">
                                <table style="text-align: center" id="zero_config" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>UserName</th>
                                        <th>Password</th>
                                        <th>Email</th>
                                        <th>Trạng Thái</th>
                                        <th>Hành Động</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($account as $value)
                                        <tr bgcolor="{{$value->trang_thai == 1 ? "66FF99" : "#FF9999"}}">
                                            <td>{{$value->username}}</td>
                                            <td>{{$value->password}}</td>
                                            <td>{{$value->email}}</td>
                                            <td>{{$value->trang_thai == 1 ? "Đang Hoạt Động" : "Vô Hiệu Hóa"}}</td>

                                            <td>
                                                <button {{$value->trang_thai == 1 ? "hidden" : ""}} type="button" name="btn_del" class="btn btn-cyan btn-sm">
                                                    <a style="color: white" href="{{route('update-acc?btn_active&id_acc='.$value->id)}}">Kích Hoạt</a>
                                                </button>

                                                <button {{$value->trang_thai == 0 ? "hidden" : ""}} type="button" name="btn_del" class="btn btn-cyan btn-sm">
                                                    <a style="color: white" href="{{route('update-acc?btn_block&id_acc='.$value->id)}}">Vô Hiệu Hóa</a>
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

