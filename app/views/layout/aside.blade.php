<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)"
                        aria-expanded="false">
                        <i class="mdi mdi-pencil"></i>
                        <span class="hide-menu">Quản Lý Website</span>
                    </a>

                    <ul aria-expanded="false" class="collapse first-level">

                        <li class="sidebar-item">
                            <a href="{{route('list-loai-phim')}}" class="sidebar-link">
                                <i class="mdi mdi-file-multiple"></i>
                                <span class="hide-menu"> Danh Mục Phim </span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{route('list-phim')}}" class="sidebar-link">
                                <i class="mdi mdi-film"></i>
                                <span class="hide-menu"> Phim </span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{route('list-cn')}}" class="sidebar-link">
                                <i class="mdi mdi-home-map-marker"></i>
                                <span class="hide-menu"> Chi Nhánh </span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{route('list-pc')}}" class="sidebar-link">
                                <i class="mdi mdi-harddisk"></i>
                                <span class="hide-menu"> Phòng Chiếu </span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{route('list-suat-chieu')}}" class="sidebar-link">
                                <i class="mdi mdi-playlist-check"></i>
                                <span class="hide-menu"> Suất Chiếu </span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{route('list-acc')}}" class="sidebar-link">
                                <i class="mdi mdi-account"></i>
                                <span class="hide-menu"> Accounts </span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route("log-out")}}" aria-expanded="false">
                        <i class="mdi mdi-logout"></i>
                        <span class="hide-menu">Đăng xuất</span>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
