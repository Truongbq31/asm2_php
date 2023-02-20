<!DOCTYPE html>
<html dir="ltr" lang="en">
@include("layout_login.head")
<body>
<div id="main-wrapper">
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
</div>
</body>
</html>

