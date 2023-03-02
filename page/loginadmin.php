<?php
use db\dbconnect;
use api\Api;

require_once("api/api.php");
require_once("connect/dbconnect.php");
require_once("system/head.php");
?>
</head>

<body>
    <main>
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">เข้าสู่ระบบ จัดการเว็บไซต์</h5>
                                <p class="text-center small">เข้าสู่ระบบจัดการเว็บไซต์</p>
                            </div>
                            <form class="row g-3 needs-validation" novalidate>
                                <div class="col-12">
                                    <label for="admin_username" class="form-label">ชื่อผู้ใช้</label>
                                    <input type="text" name="username" class="form-control" id="admin_username" placeholder="กรอกชื่อผู้ใช้" value="<?php if (isset($_COOKIE['admin_username'])) { echo $_COOKIE['admin_username']; } ?>" required>
                                    <div class="invalid-feedback">Please enter your password!</div>
                                </div>
                                <div class="col-12">
                                    <label for="admin_password" class="form-label">รหัสผ่าน</label>
                                    <input type="password" name="password" class="form-control" id="admin_password" placeholder="กรอกรหัสผ่าน" value="<?php if (isset($_COOKIE['admin_password'])) { echo $_COOKIE['admin_password']; } ?>" required>
                                    <div class="invalid-feedback">Please enter your password!</div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" <?php if (isset($_COOKIE['username'])) { ?> checked <?php } ?> id="admin_remember">
                                        <label class="form-check-label" for="admin_checkremember">จดจำรหัสผ่านหรือไม่ ?</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="button" id="submitsignin" class="btn btn-primary w-100">เข้าสู่ระบบ</button>
                                </div>
                                <div class="col-12"></div>
                            </form>
                        </div>
                    </div>
                    <div class="credits">
                        Developer by <a href="https://web.facebook.com/chanonbewRTC">Chanondevs</a> Version <?php echo Api::getVersion()?>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        $('#submitsignin').click(function() {
            var admin_username = $('#admin_username').val();
            var admin_password = $('#admin_password').val();
            var admin_remember = $('#admin_remember').prop("checked");
            $.ajax({
                type: 'POST',
                url: <?php Api::base_url_ajax('service/loginadmin.php')?>,
                dataType: 'json',
                data: {
                    admin_username,
                    admin_password,
                    admin_remember
                },
                success: function(data){
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
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>