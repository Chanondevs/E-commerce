<?php

use api\Api;
use api\auth;

require_once("../api/api.php");
require_once("../api/auth.php");
require_once("../connect/dbconnect.php");

$username = $_POST['username'];
$password = $_POST['password'];
$remember = $_POST['remember'];

if (empty($username)) {
    $response = array(
        'status' => 'error',
        'message' => 'กรุณากรอกผู้ใช้งาน',
        'href' => Api::base_url_json('login')
    );
    echo json_encode($response);
} else if (empty($password)){
    $response = array(
        'status' => 'error',
        'message' => 'กรุณากรอกรหัสผ่าน',
        'href' => Api::base_url_json('login')
    );
    echo json_encode($response);
} else {
    auth::Login($username, $password, $remember);
}

?>