<?php

namespace api;

use ApiEnum;
use db\dbconnect;

class api {

    public static function getVersion(){
        return "1.6";
    }

    public static function base_url($url){
        echo 'http://'.$_SERVER['HTTP_HOST'].'/'.$url;
    }

    public static function base_url_json($url){
        return 'http://'.$_SERVER['HTTP_HOST'].'/'.$url;
    }

    public static function base_url_ajax($url){
        echo '"' . 'http://'.$_SERVER['HTTP_HOST'].'/'.$url . '"';
    }

    /* getdata */

    public static function getUser($id){
        $stmt = dbconnect::connect()->prepare("SELECT * FROM user WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch();
        return $row;
    }

    public static function getProduct($id){
        $stmt = dbconnect::connect()->prepare("SELECT * FROM product WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch();
        return $row;
    }

    public static function clearSession() {
        session_destroy();
    }

    /* cart */

    public static function addCart($product_id){
        $item_array = array(
            'product_id' => $product_id,
            'amount' => 1
        );

        if (!isset($_SESSION['cart'])){
            $_SESSION['cart'][] = $item_array;

            $response = array(
                'status' => 'success',
                'message' => 'เพิ่มสินค้าสำเร็จ',
                'href' => Api::base_url_json('home')
            );

            echo json_encode($response);
        } else {
            foreach($_SESSION['cart'] as $val){
                $ids[] = $val['product_id'];
            }

            if (!in_array($item_array['product_id'], $ids ?? [])){
                $_SESSION['cart'][] = $item_array;

                $response = array(
                    'status' => 'success',
                    'message' => 'เพิ่มสินค้าสำเร็จ',
                    'href' => Api::base_url_json('home')
                );
    
                echo json_encode($response);
            } else {
                $_SESSION['cart'][] = $item_array;

                $response = array(
                    'status' => 'success',
                    'message' => 'เพิ่มสินค้าสำเร็จ',
                    'href' => Api::base_url_json('home')
                );
    
                echo json_encode($response);
            }
        }
    }

    public static function increaseCart($product_id){
        foreach($_SESSION['cart'] as $key => $val){
            if ($product_id == $val['product_id']){
                $_SESSION['cart'][$key]['amount'] = $val['amount'] + 1;
                $response = array(
                    'status' => 'success',
                    'message' => 'อัพเดตรายการสินค้าเเล้ว',
                    'href' => Api::base_url_json('cart')
                );
                echo json_encode($response);
            }
        }
    }

    public static function reduceCart($product_id){
        foreach($_SESSION['cart'] as $key => $val){
            if ($product_id == $val['product_id']){
                $_SESSION['cart'][$key]['amount'] = $val['amount'] - 1;
                if ($_SESSION['cart'][$key]['amount'] <= 0){
                    Api::removeCart($product_id);
                }
                $response = array(
                    'status' => 'success',
                    'message' => 'อัพเดตรายการสินค้าเเล้ว',
                    'href' => Api::base_url_json('cart')
                );
                echo json_encode($response);
            }
        }
    }

    public static function removeCart($product_id){
        foreach ($_SESSION['cart'] as $key => $value){
            if($value["product_id"] == $product_id){
                unset($_SESSION['cart'][$key]);
            } else if ($_SESSION['cart'] == null) {
                unset($_SESSION['cart']);
            }
        }
    }

    public static function CartEmpty(){
        unset($_SESSION['cart']);
    }

    public static function total(){
        $total = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $value) {
                $product_data = Api::getProduct($_SESSION['cart'][$key]['product_id']);
                $amount = $_SESSION['cart'][$key]['amount'];
                $total =  $total + $product_data['product_price'] * $amount;
            }
            return $total . " บาท";
        }
    }

    public static function genNoOrder(){
        $randomSerial = strval(rand(0, 99999999));
        $stringOrder = "P";
        return $stringOrder . $randomSerial;
    }

    /* order */
    
    public static function addOrder($user_id, $data_product){
        $order_SeqNo = api::genNoOrder();
        
        if($data_product == null) {
            $response = array(
                'status' => 'error',
                'message' => 'ไม่มีข้อมูลสินค้า'
            );
            echo json_encode($response);
        } else {
            $stmt  = dbconnect::connect()->prepare("INSERT INTO `order`(`order_SeqNo`, `order_user_id`, `order_product`) VALUES ('$order_SeqNo','$user_id','$data_product')");
            $stmt->execute();
            unset($_SESSION['cart']);
            $response = array(
                'status' => 'success',
                'message' => 'เพิ่ม order เรียบร้อย'
            );
            echo json_encode($response);
        }
    }

    public static function deleteOrder($order_SeqNo){
        $stmt = dbconnect::connect()->prepare("DELETE FROM order WHERE order_SeqNo = :order_SeqNo");
        $stmt->execute([':order_SeqNo' => $order_SeqNo]);
        
        $response = array(
            'status' => 'success',
            'message' => 'ลบ order เรียบร้อยเเล้ว'
        );
        echo json_encode($response);
    }

    public static function getDataProductJsonDecode($order_SeqNo){
        $stmt = dbconnect::connect()->prepare("SELECT * FROM `order` WHERE order_SeqNo = :order_SeqNo");
        $stmt->execute([':order_SeqNo' => $order_SeqNo]);
        $row = $stmt->fetch();

        $order_data_product = $row['order_product'];
        $order_data_decode = json_decode($order_data_product);
        return $order_data_decode;
    }

    public static function TestEnum(){
        echo ApiEnum::getStatus("Status0");
    }


}

?>