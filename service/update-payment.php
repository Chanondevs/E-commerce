<?php
header('Content-Type: charset=utf-8');

if (!isset($_SESSION)) {
    session_start();
}

require_once("../connect/dbconnect.php");
require_once("../api/api.php");

use api\api;
use db\dbconnect;

$order_SeqNo = $_POST['order_SeqNo'];

if (isset($_FILES)) {
    $status = 0;
    foreach ($_FILES as $file) {
        // print_r($file);
        //ตัดขื่อเอาเฉพาะนามสกุล
        $typefile = strrchr($file['name'], ".");
        //สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ใหม่
        $date1 = date("Ymd_His");
        //สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
        $numrand = (mt_rand());
        //โฟลเดอร์ที่เก็บไฟล์ **สร้างไฟล์ index.php หรือ index.html (ไม่ต้องมี code) ไว้ในโฟลเดอร์ด้วยนะครับจะได้ป้องกันการเข้าถึงทุกไฟล์ในโฟลเดอร์
        $path = "../assets/img/slip/";
        $name = $file['name'];
        //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
        $newname = $date1 . $name;
        $path_copy = $path . $newname;
        //คัดลอกไฟล์ไปยังโฟลเดอร์
        $allowedFileType = ['jpg', 'jpeg', 'png', 'gif', 'PNG', 'JPG', 'JPEG', 'image/jpeg'];
        if (in_array($file['type'], $allowedFileType)) {
            if (move_uploaded_file($file['tmp_name'], $path_copy)) {
                $stmt = dbconnect::connect()->prepare("UPDATE `orders` SET `order_payment_img`='$newname' WHERE order_SeqNo = '$order_SeqNo'");
                $stmt->execute();
                unset($_SESSION['order_SeqNo']);
            } else {
                $status = 1;
            }
        } else {
            $status = 1;
        }
    }
    if ($status == 0) {
        $response = array(
            'status' => 'success',
            'message' => 'อัพรูปภาพสลิปสำเร็จ',
            'href' => '/'
        );
        echo json_encode($response);
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'อัพรูปภาพสลิปไม่สำเร็จ',
            'file' => $_FILES,
            'type' => $file['type'],
            'href' => '/checkout'
        );
        echo json_encode($response);
    }
}
