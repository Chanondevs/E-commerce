<?php

// echo "<pre>"; print_r($_SESSION); echo "<br>";

use api\api;
use message\Message;

if (isset($_SESSION['admin_id'])){
    $data_user = api::getUser($_SESSION['admin_id']);
} else {
    $data_user = null;
}

require_once 'system/headadmin.php';
?>
<body>
    
    <?php
    if (isset($_SESSION['admin_id'])){
    ?>
    
    <?php
    } else {
        $msg = new Message();
        $msg->msg_error("กรุณาเข้าสู่ระบบ","ระบบกำลังพาคุณไป. . .","","/loginadmin");
    }
    ?>
</body>
</html>