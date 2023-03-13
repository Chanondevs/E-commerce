<?php

use api\Api;
use api\order;

?>

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
                <a href="<?php Api::base_url('admin/?page=order') ?>" class="nav-link">ออเดอร์ <?php order::checkOrderNewNav() ?></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="<?php Api::base_url('assets/img/logo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">RTCShop</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-header">หน้าหลัก</li>
                    <li class="nav-item">
                        <a href="<?php Api::base_url('admin/?page=home') ?>" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                หน้าหลัก
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">จัดการออเดอร์</li>
                    <li class="nav-item">
                        <a href="<?php Api::base_url('admin/?page=order') ?>" class="nav-link">
                            <i class="nav-icon fa-solid fa-cart-shopping"></i>
                            <p>
                                ออเดอร์
                                <?php order::checkOrderNewNav() ?>
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">เพิ่มสินค้า</li>
                    <li class="nav-item">
                        <a href="<?php Api::base_url('admin/?page=add-product') ?>" class="nav-link">
                            <i class="nav-icon fa-solid fa-cart-plus"></i>
                            <p>
                                เพิ่มสินค้า
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">ออกจากระบบ</li>
                    <li class="nav-item">
                        <a href="<?php Api::base_url('logout') ?>" class="nav-link">
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
                        <h1 class="m-0">ประวัติออเดอร์</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active"><a href="#">ประวัติออเดอร์</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ประวัติออเดอร์</h3>
                </div>
                <div class="card-body p-0">
                    <div class="container pt-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
        <!-- /.content-wrapper -->
    </div>