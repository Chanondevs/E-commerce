<?php

use api\api;

require_once("../api/api.php");
require_once("../connect/dbconnect.php");

$id = $_POST['id'];
$edit_user_name = $_POST['edit_user_name'];
$edit_user_surname = $_POST['edit_user_surname'];
$edit_user_username = $_POST['edit_user_username'];

if (empty($edit_user_name)){
    $response = array(
        'status' => 'error',
        'message' => 'กรุณากรอกตำแหน่งงาน',
        'href' => 'register.php'
    );
    echo json_encode($response);
} else if (empty($edit_user_surname)){
    $response = array(
        'status' => 'error',
        'message' => 'กรุณากรอกจำนวนที่รับสมัคร',
        'href' => 'register.php'
    );
    echo json_encode($response);
} else if (empty($edit_user_username)){
    $response = array(
        'status' => 'error',
        'message' => 'กรุณาเลือกประเภทเงินเดือน',
        'href' => 'register.php'
    );
    echo json_encode($response);
} else {
    api::EditUser($id, $edit_user_name, $edit_user_surname, $edit_user_username);   
}
?>
