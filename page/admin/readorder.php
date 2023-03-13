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
    <link href="/assets/css/bootstrap-steps.css" rel="stylesheet">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Icon Font Stylesheet -->
    <script rel="prefetch" src="https://kit.fontawesome.com/178efd6c64.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://w2ui.com/src/w2ui-1.5.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.2.2/swiper-bundle.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.2.2/swiper-bundle.min.js"></script>

    <link href="/assets/plugins/bs-stepper/css/bs-stepper.min.css" rel="stylesheet">
    <link href="/assets/css/adminlte.css" rel="stylesheet">
    <script type="text/javascript" src="/assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <script type="text/javascript" src="/assets/js/adminlte.js"></script>
    <script type="text/javascript" src="/assets/js/demo.js"></script>

    <?php

    use api\api;

    ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="/assets/img/E-ComLogo.png" alt="AdminLTELogo">
    </div>
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
                    <a href="/admin/order" class="nav-link">ออเดอร์ <?php api::checkOrderNewNav() ?></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="/assets/img/E-ComLogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">E-Com Backend</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-header">หน้าหลัก</li>
                        <li class="nav-item">
                            <a href="/admin" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    หน้าหลัก
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">จัดการออเดอร์</li>
                        <li class="nav-item">
                            <a href="/admin/order" class="nav-link active">
                                <i class="nav-icon fa-solid fa-cart-shopping"></i>
                                <p>
                                    ออเดอร์
                                    <?php api::checkOrderNewNav() ?>
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">เพิ่มสินค้า</li>
                        <li class="nav-item">
                            <a href="/admin/add-product" class="nav-link">
                                <i class="nav-icon fa-solid fa-cart-plus"></i>
                                <p>
                                    เพิ่มสินค้า
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

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">ออเดอร์ <?php echo $order_SeqNo ?></h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="container d-flex justify-content-center text-center pt-3">
                            <?php api::getStatusOrder($order_SeqNo) ?>
                        </div>
                        <div class="container pt-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">สลิปการโอนเงิน</h3>
                                        </div>
                                        <div class="card-body">
                                            <img src="/assets/img/slip/333370208_623472879556294_2002879955050742192_n.jpg" class="rounded mx-auto d-block" alt="..." width="300" height="400">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">อัพเดตสถานะ</h3>
                                        </div>
                                        <?php api::elementEditOrder($order_SeqNo) ?>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">รายละเอียดราคา</h3>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-striped datatable">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">ชื่อสินค้า</th>
                                                        <th scope="col">ราคาสินค้า</th>
                                                        <th scope="col">จำนวน</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php api::getProductListOrder($order_SeqNo); ?>
                                                </tbody>
                                            </table>
                                            <hr>
                                            <h6>ยอดรวมทั้งหมด</h6>
                                            <h6><?php echo api::getProductTotal($order_SeqNo); ?></h6>
                                        </div>
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
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })

        $(function() {
            bsCustomFileInput.init();
        });

        function deleteOrder(order_SeqNo) {
            $.ajax({
                type: 'POST',
                url: <?php Api::base_url_ajax('service/admin-delete-order.php') ?>,
                dataType: 'json',
                data: {
                    order_SeqNo
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
        }

        function confirm(order_SeqNo) {
            $.ajax({
                type: 'POST',
                url: <?php Api::base_url_ajax('service/admin-confirm-order.php') ?>,
                dataType: 'json',
                data: {
                    order_SeqNo
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
        }

        function notconfirm(order_SeqNo) {
            $.ajax({
                type: 'POST',
                url: <?php Api::base_url_ajax('service/admin-notconfirm-order.php') ?>,
                dataType: 'json',
                data: {
                    order_SeqNo
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
        }

        function finishedpreparing(order_SeqNo) {
            $.ajax({
                type: 'POST',
                url: <?php Api::base_url_ajax('service/admin-finishedpreparing-order.php') ?>,
                dataType: 'json',
                data: {
                    order_SeqNo
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
        }

        function finisheddelivery(order_SeqNo) {
            $.ajax({
                type: 'POST',
                url: <?php Api::base_url_ajax('service/admin-finisheddelivery-order.php') ?>,
                dataType: 'json',
                data: {
                    order_SeqNo
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
        }

        $("#submitAddproduct").click(function() {
            var product_name = $('#product_name').val();
            var product_price = $('#product_price').val();
            var product_amount = $('#product_amount').val();
            var product_image = $("#product_image").prop('files')[0];
            var form_data = new FormData();
            form_data.append('product_name', product_name);
            form_data.append('product_price', product_price);
            form_data.append('product_amount', product_amount);
            form_data.append('product_image', product_image);
            $.ajax({
                type: 'POST',
                url: <?php Api::base_url_ajax('service/admin-add-product.php') ?>,
                contentType: false,
                processData: false,
                dataType: 'json',
                data: form_data,
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
        })

        function EditProduct(product_id) {
            $.ajax({
                type: 'POST',
                url: '/service/editpost.php',
                dataType: 'json',
                data: {
                    product_id
                },
                success: function(data) {
                    $("#edit_post_position").val(data.response.post_position);
                    $("#edit_post_number_people").val(data.response.post_number_people);
                    $("#edit_post_salary_type").val(data.response.post_salary_type);
                    $("#edit_post_salary").val(data.response.post_salary);
                    $("#edit_post_content").val(data.response.post_content);
                    $("#edit_post_id").val(data.response.post_id);
                    $('#model_edit_post').modal('show');
                }
            })
        }

        function deleteProduct(product_id) {
            $.ajax({
                type: 'POST',
                url: <?php Api::base_url_ajax('service/admin-delete-order.php') ?>,
                dataType: 'json',
                data: {
                    product_id
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
        }

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
    <!-- AdminLTE App -->
    <script src="/assets/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/assets/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="/assets/dist/js/pages/dashboard.js"></script>
</body>

</html>