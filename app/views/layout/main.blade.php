@if(isset($_SESSION['username']))
<!DOCTYPE html>
<html dir="ltr" lang="en">

@include('layout.head')

<body>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
@include("layout.header")

@include("layout.aside")

    <section class="content">
            @php
            if (isset($_SESSION['noti'])){
                $msg = $_SESSION['noti'];
                echo "<script>alert(`${msg}`)</script>";
                unset($_SESSION['noti']);
            }
            @endphp

        @yield("content")
    </section>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
@include("layout.footer")

</body>

</html>
@else
    {{header("location:".route("login"))}}
@endif