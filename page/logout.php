<?php
use api\Api;
use message\Message;

require_once("api/message.php");
require_once("api/api.php");
require_once("system/head.php");

?>
</head>

<body>
    <?php
        // session_start();

        // session_unset();
        // session_destroy();

        // if (isset($_COOKIE['login_username'])) {
        //     unset($_COOKIE['login_username']);
        //     unset($_COOKIE['login_password']);
        //     setcookie('login_username', '', time() - 3600, '/');
        //     setcookie('login_password', '', time() - 3600, '/');
        // }
        if (isset($_SESSION['admin_id'])){
            unset($_SESSION['admin_id']);
            $msg = new Message();
            $msg->msg_toast_success("ออกจากระบบสำเร็จ", "2500", Api::base_url_json('/'));
        } else if (isset($_SESSION['user_id'])){
            unset($_SESSION['user_id']);
            $msg = new Message();
            $msg->msg_toast_success("ออกจากระบบสำเร็จ", "2500", Api::base_url_json('/'));
        }
    ?>
</body>

</html>
