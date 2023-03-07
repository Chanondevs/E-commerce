<?php

use api\Api;
use message\Message;

require_once("connect/dbconnect.php");
require_once("system/head.php");
require_once("api/api.php");
require_once("api/order.php");
require_once("api/message.php");

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
                    <i class="fas fa-shopping-basket"></i> RTCShop
                </h3>
            </a>
            <a href="<?php Api::base_url_json('card') ?>" class="nav-item nav-link active">
                <h5 class="px-5 cart text-white">
                    <i class="fas fa-shopping-cart"></i> Cart
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
    </nav>

    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="pt-4 ps-3 pe-3">
                        <h6>ตะกร้าของฉัน</h6>
                        <hr>
                        <?php
                        $product_id = 0;
                        if (empty($_SESSION['cart'])) {
                            echo "<h6>ยังไม่มีรายการขณะนี้</h6>";
                        } else if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $product_id = $value["product_id"];
                                api::cartElement($product_id);
                            }
                        }
                        ?>
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
                                        <?php api::GetProductList(); ?>
                                    </tbody>
                                </table>
                                <hr>
                                <h6>ยอดรวมทั้งหมด</h6>
                                <h6><?php echo api::total(); ?></h6>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-5">
                        <button type="button" id="submitOrder" class="btn btn-success">ยืนยันสั่งซื้อสินค้า</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer style="background-color: #333;">
        <div class="container-fluid bg-dark-footer copyright py-3">
            <div class="row pt-3 pb-3">
                <div class="col-md-12 text-center mb-3 mb-md-0 text-white">
                    &copy; Copyright <strong><span>RTCShop</span></strong>. 2023 Developer by <a href="https://web.facebook.com/chanonbewRTC" class="text-primary">Amonwan</a> Version <?php echo Api::getVersion() ?>
                </div>
            </div>
        </div>
    </footer>

    <script>
        $("#submitOrder").click(function() {
            var data = <?php echo $data_cart; ?>;

            $.ajax({
                type: 'POST',
                url: <?php Api::base_url_ajax('service/add-order.php') ?>,
                dataType: 'json',
                data: {
                    data
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
        })

        function reduceCart(id) {
            $.ajax({
                type: 'POST',
                url: <?php Api::base_url_ajax('service/reduce-cart.php') ?>,
                dataType: 'json',
                data: {
                    id
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

        function increaseCart(id) {
            $.ajax({
                type: 'POST',
                url: <?php Api::base_url_ajax('service/increase-cart.php') ?>,
                dataType: 'json',
                data: {
                    id
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