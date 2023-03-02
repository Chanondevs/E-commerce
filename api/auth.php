<?php

namespace api;

use db\dbconnect;
use PDOException;

session_start();

class auth{

    public static function Login($username, $password, $remem){
        try {
            $stmt = dbconnect::connect()->prepare("SELECT * FROM user WHERE user_name = :username");
            $stmt->execute([':username' => $username]);
            $row = $stmt->fetch();
            if (!empty($row)) {
                if ($password == $row['user_password']) {
                    $_SESSION['user_id'] = $row['id'];
                    if ($remem == true) {
                        setcookie('username', $username, time() + (10 * 365 * 24 * 60 * 60), "/", "", false, true);
                        setcookie('password', $password, time() + (10 * 365 * 24 * 60 * 60), "/", "", false, true);
                    } else {
                        setcookie('username', '', time() - 3600, '/');
                        setcookie('password', '', time() - 3600, '/');
                    }

                    $response = array(
                        'status' => 'success',
                        'message' => 'เข้าสู่ระบบสำเร็จ',
                        'href' => api::base_url_json('home')
                    );
                    echo json_encode($response);
                } else {
                    $response = array(
                        'status' => 'error',
                        'message' => 'รหัสผ่านไม่ถูกต้อง',
                        'href' => api::base_url_json('login')
                    );
                    echo json_encode($response);
                }
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => 'ไม่พบผู้ใช้อยู่ในระบบ',
                    'href' => api::base_url_json('login')
                );
                echo json_encode($response);
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function Loginadmin($username, $password, $remem){
        $stmt = dbconnect::connect()->prepare("SELECT * FROM admin WHERE admin_username = :admin_username");
        $stmt->execute(['admin_username' => $username]);
        $row = $stmt->fetch();
        if(!empty($row)){
            if($password == $row['admin_password']){
                $_SESSION['admin_id'] = $row['id'];
                
                $response = array(
                    'status' => 'success',
                    'message' => 'เข้าสู่ระบบสำเร็จ',
                    'href' => api::base_url_json('admin')
                );
                echo json_encode($response);
            } else {
                $response = array(
                    'status' => 'error',
                    'message' => 'รหัสผ่านไม่ถูกต้อง',
                    'href' => api::base_url_json('loginadmin')
                );
                echo json_encode($response);
            }
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'ไม่พบผู้ใช้อยู่ในระบบ',
                'href' => api::base_url_json('loginadmin')
            );
            echo json_encode($response);
        }
    }
}
