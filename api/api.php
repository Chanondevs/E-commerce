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

    public static function GetProductList(){
        if (isset($_SESSION['cart'])){
            foreach($_SESSION['cart'] as $key => $val){
                $data_product = api::getProduct($val['product_id']);
                $product_name = $data_product['product_name'];
                $product_price = $data_product['product_price'];
                $product_amount = $_SESSION['cart'][$key]['amount'];
                $element = "<tr>
                <td>$product_name</td>
                <td>$product_price</td>
                <td>$product_amount</td>
            </tr>";
            echo $element;
            }
        }
    }

    public static function cartElement($product_id){
        $product_data = api::getProduct($product_id);
        $productimg = $product_data['product_image'];
        $productname = $product_data['product_name'];
        $productprice = $product_data['product_price'];
        $productimg = api::base_url_json("assets/img/product/" . $productimg);
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $value) {
                $count = $_SESSION['cart'][$key]['amount'];
            }
        }
        $element = "
            <div class=\"card mb-3\">
                <div class=\"row g-0\">
                    <div class=\"col-md-2 d-flex\">
                        <img src=$productimg alt=\"Image1\" class=\"img-fluid align-item-center\">
                    </div>
                    <div class=\"col-md-5\">
                        <br>
                        <br>
                        <h5 class=\"pt-2\">$productname</h5>
                        <h5 class=\"pt-2\">ราคา $productprice บาท</h5>
                    </div>
                    <div class=\"col-md-3 py-5\">
                        <div>
                            <br>
                            <button type=\"submit\" class=\"btn bg-light border rounded-circle\" onclick=\"reduceCart('$product_id')\"><i class=\"fas fa-minus\"></i></button>
                            <input type=\"tel\" value=\"$count\" class=\"form-control w-25 d-inline\">
                            <button type=\"submit\" class=\"btn bg-light border rounded-circle\" onclick=\"increaseCart('$product_id')\"><i class=\"fas fa-plus\"></i></button>
                        </div>
                    </div>
                </div>
            </div>";
            echo $element;
    }

    public static function TestEnum(){
        echo ApiEnum::getStatus("Status0");
    }


}

?>