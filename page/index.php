<?php

// echo "<pre>"; print_r($_SESSION); echo "<br>";

use api\api;

if (isset($_SESSION['user_id'])) {
    $data_user = api::getUser($_SESSION['user_id']);
} else {
    $data_user = "";
}

require_once 'system/head.php';

?>

<body>
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a href="<?php echo Api::base_url_json('home'); ?>" class="navbar-brand">
                <h3 class="px-5 text-white">
                    <i class="fas fa-shopping-basket"></i> Webshop
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
        <?php 
        
        Api::TestEnum()

        ?>
    </main>

    <footer style="background-color: #333;">
        <div class="container-fluid bg-dark-footer copyright">
            <div class="row pt-4 pb-4">
                <div class="col-md-12 text-center mb-3 mb-md-0 text-white">
                    &copy; Copyright <strong><span>Chanondevs</span></strong>. All Rights Reserved 2023 Developer by <a href="https://web.facebook.com/chanonbewRTC" class="text-success">Chanondevs</a> Version <?php require_once 'api/api.php'; echo api::getVersion(); ?>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>