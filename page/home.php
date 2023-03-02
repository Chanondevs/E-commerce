<?php

// echo "<pre>"; print_r($_SESSION); echo "<br>";

use api\api;
use message\Message;
require_once 'system/head.php';
?>

<body>
    <?php 
    if (isset($_SESSION['user_id'])){
        $data_user = api::getUser($_SESSION['user_id']);
    ?>
    
    <?php 
    } else {
        $msg = new Message();
        $msg->msg_error("กรุณาเข้าสู่ระบบ","ระบบกำลังพาคุณไป. . .","","/login");
    }
    ?>
</body>
</html>