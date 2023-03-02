<?php

use api\Api;
use api\auth;

require_once("../api/api.php");
require_once("../api/auth.php");
require_once("../connect/dbconnect.php");

$admin_username = $_POST['admin_username'];
$admin_password = $_POST['admin_password'];
$admin_remember = $_POST['admin_remember'];

if (empty($admin_username)) {
    $response = array(
        'status' => 'error',
        'message' => 'กรุณากรอกผู้ใช้งาน',
        'href' => Api::base_url_json('login')
    );
    echo json_encode($response);
} else if (empty($admin_password)){
    $response = array(
        'status' => 'error',
        'message' => 'กรุณากรอกรหัสผ่าน',
        'href' => Api::base_url_json('login')
    );
    echo json_encode($response);
} else {
    auth::Loginadmin($admin_username, $admin_password, $admin_remember);
}

?>