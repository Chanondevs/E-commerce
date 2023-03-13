<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Webshop</title>
    <meta name="description" content="Webshop">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/css" href="http://w2ui.com/src/w2ui-1.5.min.css" />
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    
    <!-- Icon Font Stylesheet -->
    <script rel="prefetch" src="https://kit.fontawesome.com/178efd6c64.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://w2ui.com/src/w2ui-1.5.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.2.2/swiper-bundle.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.2.2/swiper-bundle.min.js"></script>

    <link href="/assets/css/adminlte.css" rel="stylesheet">
    <script type="text/javascript" src="/assets/js/adminlte.js"></script>
    <script type="text/javascript" src="/assets/js/demo.js"></script>

    <?php

    use api\api;

    ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link">หน้าหลัก</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="<?php api::base_url('admin/?page=order') ?>" class="nav-link">ออเดอร์ <?php api::checkOrderNewNav() ?></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="<?php api::base_url('assets/img/logo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">RTCShop</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-header">หน้าหลัก</li>
                    <li class="nav-item">
                        <a href="<?php api::base_url('admin/?page=home') ?>" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                หน้าหลัก
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">จัดการออเดอร์</li>
                    <li class="nav-item">
                        <a href="<?php api::base_url('admin/?page=order') ?>" class="nav-link active">
                            <i class="nav-icon fa-solid fa-cart-shopping"></i>
                            <p>
                                ออเดอร์
                                <?php api::checkOrderNewNav() ?>
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">เพิ่มสินค้า</li>
                    <li class="nav-item">
                        <a href="<?php api::base_url('admin/?page=add-product') ?>" class="nav-link">
                            <i class="nav-icon fa-solid fa-cart-plus"></i>
                            <p>
                                เพิ่มสินค้า
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">ออกจากระบบ</li>
                    <li class="nav-item">
                        <a href="<?php api::base_url('logout') ?>" class="nav-link">
                            <i class="nav-icon  fa-solid fa-right-from-bracket"></i>
                            <p>
                                ออกจากระบบ
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">ออเดอร์</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active"><a href="#">ออเดอร์</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- Main content -->
        <section class="content">
            <!-- /.card -->
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- Recent Sales -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">ออเดอร์ <?php api::checkOrderNewNav() ?></h3>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">ชื่อผู้ใช้</th>
                                                <th scope="col">เลขออเดอร์</th>
                                                <th scope="col">เวลา</th>
                                                <th scope="col text-center">สถานะ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php api::getOrderList() ?>
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div><!-- End Recent Sales -->

                    </div>
                </div><!-- End Left side columns -->

            </div>
        </section>
        <!-- /.content -->

        <!-- <div class="container d-flex justify-content-center">
            <div class="slide-container">
                <div class="mb-4">
                    <h5 class="text-center">สถานะการจัดส่ง</h5>
                </div>
                <ul class="steps">
                    <li class="step">
                        <div class="step-content">
                            <span class="step-circle">1</span>
                            <span class="step-text">รอรับออเดอร์</span>
                        </div>
                    </li>
                    <li class="step">
                        <div class="step-content">
                            <span class="step-circle">2</span>
                            <span class="step-text"></span>
                        </div>
                    </li>
                    <li class="step">
                        <div class="step-content">
                            <span class="step-circle">3</span>
                            <span class="step-text"></span>
                        </div>
                    </li>
                    <li class="step">
                        <div class="step-content">
                            <span class="step-circle">4</span>
                            <span class="step-text"></span>
                        </div>
                    </li>
                </ul>
            </div>
        </div> -->
    </div>
    <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- jQuery -->
<script src="/assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/assets/plugins/moment/moment.min.js"></script>
<script src="/assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
</body>
</html>
