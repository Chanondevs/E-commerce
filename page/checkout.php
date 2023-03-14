<?php

use api\api;
use message\Message;

require_once("connect/dbconnect.php");
require_once("api/api.php");
require_once("api/message.php");
require_once 'system/head.php';
if (!empty($_SESSION['cart'])) {
    $data_cart = json_encode($_SESSION['cart']);
}
?>
</head>

<body>

    <?php

    if (!isset($_SESSION['user_id'])) {
        Message::msg_toast_error("กรุณาเข้าสู่ระบบ", "2500", Api::base_url_json("login"));
    }

    ?>

    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a href="<?php echo Api::base_url_json('home'); ?>" class="navbar-brand">
                <h3 class="px-5 text-white">
                    <i class="fas fa-shopping-basket"></i> E-Com
                </h3>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="px-5 collapse navbar-collapse" id="navbarsExample09">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white active" aria-current="page" href="<?php echo Api::base_url_json('home'); ?>">หน้าหลัก</a>
                    </li>
                </ul>
                <a href="<?php echo Api::base_url_json('cart'); ?>" class="nav-item nav-link active">
                    <h5 class="cart text-white ">
                        <i class="fas fa-shopping-cart"></i> ตะกร้า
                        <?php

                        if (isset($_SESSION['cart'])) {
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                        } else {
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                        }

                        ?>
                    </h5>
                </a>
            </div>
        </div>
    </nav>

    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="pt-4 ps-3 pe-3">
                        <h6>อัพเดตการโอนเงิน</h6>
                        <hr>
                        <div class="card mb-3">
                            <div class="row px-4 py-4">
                                <div class="col-xl-12">
                                    <div class="mb-1">กรุณาใส่สลิปการโอนเงิน</div>
                                    <div class="input-group mb-3">
                                        <input id="slipupload" type="file" class="form-control">
                                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                    </div>
                                    <div class="mt-1">
                                        <button type="button" id="submitslipupload" class="btn btn-success">อัพเดตสลิปการโอนเงิน</button>
                                        <a href="company.php?page=home"><button type="button" class="btn btn-danger">ยกเลิก</button></a>
                                    </div>
                                    <input id="order_SeqNo" type="hidden" value="<?php echo $_SESSION['order_SeqNo']?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 offset-md-1 rounded mt-5 bg-white h-25">
                    <div class="card">
                        <div class="pt-4 ps-3 pe-3">
                            <div class="card-body">
                                <h6>รายการสินค้า</h6>
                                <hr>
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">ชื่อสินค้า</th>
                                            <th scope="col">ราคาสินค้า</th>
                                            <th scope="col">จำนวน</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php api::GetOrderListCheckOut($_SESSION['order_SeqNo']); ?>
                                    </tbody>
                                </table>
                                <hr>
                                <h6>ยอดรวมทั้งหมด</h6>
                                <h6><?php echo api::total(); ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer style="background-color: #333;">
        <div class="container-fluid bg-dark-footer copyright">
            <div class="row pt-4 pb-4">
                <div class="col-md-12 text-center mb-3 mb-md-0 text-white">
                    &copy; Copyright <strong><span>Chanondevs</span></strong>. All Rights Reserved 2023 Developer by <span>Chanondevs</span> Version <?php require_once 'api/api.php';
                                                                                                                                                        echo api::getVersion(); ?>
                </div>
            </div>
        </div>
    </footer>

    <script>
        $("#submitslipupload").click(function() {
            var slipupload = $("#slipupload").prop('files')[0];
            var order_SeqNo = $("#order_SeqNo").val();
            var form_data = new FormData();
            form_data.append("slipupload", slipupload);
            form_data.append("order_SeqNo", order_SeqNo);

            console.log(form_data)

            $.ajax({
                type: 'POST',
                url: '/service/update-payment.php',
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
        });
    </script>

    <script>
        var swiper = new Swiper(".slide-container", {
            slidesPerView: 3,
            spaceBetween: 20,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                dynamicBullets: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },

            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                520: {
                    slidesPerView: 2,
                },
                768: {
                    slidesPerView: 3,
                },
                1000: {
                    slidesPerView: 4,
                },
            },
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>