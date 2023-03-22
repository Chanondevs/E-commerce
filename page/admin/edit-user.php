<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Webshop</title>
    <meta name="description" content="Webshop">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
                <a href="<?php Api::base_url('admin/?page=order') ?>" class="nav-link">ออเดอร์ <?php api::checkOrderNewNav() ?></a>
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
                        <a href="/admin/" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                หน้าหลัก
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">จัดการออเดอร์</li>
                    <li class="nav-item">
                        <a href="/admin/order" class="nav-link">
                            <i class="nav-icon fa-solid fa-cart-shopping"></i>
                            <p>
                                ออเดอร์
                                <?php api::checkOrderNewNav() ?>
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">จัดการสมาชิก</li>
                    <li class="nav-item">
                        <a href="/admin/edit-user" class="nav-link active">
                            <i class="nav-icon fa-solid fa-user"></i>
                            <p>
                                จัดการสมาชิก
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">ออกจากระบบ</li>
                    <li class="nav-item">
                        <a href="/logout" class="nav-link">
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
                        <h1 class="m-0">จัดการสมาชิก</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active"><a href="#">จัดการสมาชิก</a></li>
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
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fa-solid fa-user"></i>
                                        จัดการสมาชิก
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true">แก้ไขชื่อของผู้ใช้</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="custom-content-below-tabContent">
                                        <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                                            <table class="table table-striped datatable">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">ชื่อ</th>
                                                        <th scope="col">นามสกุล</th>
                                                        <th scope="col">username</th>
                                                        <th scope="col text-center">จัดการ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php api::getUserListAdmin() ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card -->
                            </div>
                        </div><!-- End Recent Sales -->

                    </div>
                </div><!-- End Left side columns -->

            </div>

            <!-- Modal -->
            <div class="modal fade" id="model_edit_user" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">แก้ไขข้อมูล</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-1">ชื่อ</div>
                            <div class="input-group input-group-md flex-nowrap mb-2">
                                <input type="text" id="edit_user_name" class="form-control" placeholder="แก้ไขชื่อของ user" />
                            </div>
                            <div class="mb-1">นามสกุล</div>
                            <div class="input-group input-group-md flex-nowrap mb-2">
                                <input type="text" id="edit_user_surname" class="form-control" placeholder="แก้ไขนามสกุลของ user" />
                            </div>
                            <div class="mb-1">username</div>
                            <div class="input-group input-group-md flex-nowrap mb-2">
                                <input type="text" id="edit_user_username" class="form-control" placeholder="ตั้งชื่อผู้ใช้ของ user ใหม่" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                            <button type="button" class="btn btn-success" id="submitEditUser">แก้ไขข้อมูล</button>
                        </div>
                        <input type='hidden' id='edit_user_id'>
                    </div>
                </div>
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
<script>
    function EditUser(id) { 
        $.ajax({
            type: 'POST',
            url: '/service/admin-edit-user.php',
            dataType: 'json',
            data: {
                id
            },
            success: function(data) {
                $("#edit_user_id").val(data.response.id);
                $("#edit_user_name").val(data.response.name);
                $("#edit_user_surname").val(data.response.surname);
                $("#edit_user_username").val(data.response.user_name);
                $('#model_edit_user').modal('show');
            }
        })
    }
    
    function deleteUser(id) {
        Swal.fire({
            title: 'คุณแน่ใจหรือไม่?',
            text: "คุณแน่ใจหรือไม่ที่ต้องการลบผู้ใช้!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ยืนยันลบผู้ใช้',
            cancelButtonText: 'ยกเลิกลบผู้ใช้'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: '/service/admin-delete-user.php',
                    dataType: 'json',
                    data: {id},
                    success: function(data) {
                        if (data.status == "success") {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-right',
                                showConfirmButton: false,
                                timer: 2500,
                                timerProgressBar: true
                            })
                            Toast.fire({
                                icon: data.status,
                                title: data.message
                            }).then((result) => {
                                if (result.isDismissed) {
                                    window.location.href = data.href;
                                }
                            })
                        } else {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-right',
                                showConfirmButton: false,
                                timer: 2500,
                                timerProgressBar: true
                            })
                            Toast.fire({
                                icon: data.status,
                                title: data.message
                            }).then((result) => {
                                if (result.isDismissed) {
                                    window.location.href = data.href;
                                }
                            })
                        }
                    }
                })
            }
        })
    }

    $("#submitEditUser").click(function() {
            var id = $("#edit_user_id").val();
            var edit_user_name = $("#edit_user_name").val();
            var edit_user_surname = $("#edit_user_surname").val();
            var edit_user_username = $("#edit_user_username").val();

            $.ajax({
                type: 'POST',
                url: '/service/admin-update-user.php',
                dataType: 'json',
                data: {
                    id,
                    edit_user_name,
                    edit_user_surname,
                    edit_user_username
                },
                success: function(data) {
                    if (data.status == "success") {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-right',
                            showConfirmButton: false,
                            timer: 2500,
                            timerProgressBar: true
                        })
                        Toast.fire({
                            icon: data.status,
                            title: data.message
                        }).then((result) => {
                            if (result.isDismissed) {
                                window.location.href = data.href;
                            }
                        })
                    } else {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-right',
                            showConfirmButton: false,
                            timer: 2500,
                            timerProgressBar: true
                        })
                        Toast.fire({
                            icon: data.status,
                            title: data.message
                        }).then((result) => {
                            if (result.isDismissed) {
                                window.location.href = data.href;
                            }
                        })
                    }
                }
            })
        });
</script>
<!-- jQuery -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="/assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
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
<!-- Summernote -->
<script src="/assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
</body>
</html>
