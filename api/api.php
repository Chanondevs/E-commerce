<?php

namespace api;

use ApiEnum;
use db\dbconnect;

if(!isset($_SESSION)) { 
    session_start(); 
} 

class api {

    public static $status0 = '
        <div class="slide-container">
            <div class="mb-4">
                <h5>สถานะการจัดส่ง</h5>
            </div>
            <ul class="steps">
                <li class="step">
                    <div class="step-content">
                        <span class="step-circle">1</span>
                        <span class="step-text">รอรับออเดอร์</span>
                    </div>
                </li>
                <li class="step">
                    <div class="step-content">
                        <span class="step-circle">2</span>
                        <span class="step-text"></span>
                    </div>
                </li>
                <li class="step">
                    <div class="step-content">
                        <span class="step-circle">3</span>
                        <span class="step-text"></span>
                    </div>
                </li>
                <li class="step">
                    <div class="step-content">
                        <span class="step-circle">4</span>
                        <span class="step-text"></span>
                    </div>
                </li>
            </ul>
        </div>';
    public static $status1 = '
        <div class="slide-container">
            <div class="mb-4">
                <h5>สถานะการจัดส่ง</h5>
            </div>
            <ul class="steps">
                <li class="step">
                    <div class="step-content step-success">
                        <span class="step-circle">1</span>
                        <span class="step-text">รับออเดอร์แล้ว</span>
                    </div>
                </li>
                <li class="step">
                    <div class="step-content step-active">
                        <span class="step-circle">2</span>
                        <span class="step-text">กำลังจัดสินค้า
                        </span>
                    </div>
                </li>
                <li class="step">
                    <div class="step-content">
                        <span class="step-circle">3</span>
                        <span class="step-text"></span>
                    </div>
                </li>
                <li class="step">
                    <div class="step-content">
                        <span class="step-circle">4</span>
                        <span class="step-text"></span>
                    </div>
                </li>
            </ul>
        </div>';
    public static $status2 = '
        <div class="slide-container">
            <div class="mb-4">
                <h5>สถานะการจัดส่ง</h5>
            </div>
            <ul class="steps">
                <li class="step">
                    <div class="step-content step-success">
                        <span class="step-circle">1</span>
                        <span class="step-text">รับออเดอร์แล้ว</span>
                    </div>
                </li>
                <li class="step">
                    <div class="step-content step-success">
                        <span class="step-circle">2</span>
                        <span class="step-text">จัดสินค้าเเล้ว
                        </span>
                    </div>
                </li>
                <li class="step">
                    <div class="step-content step-active">
                        <span class="step-circle">3</span>
                        <span class="step-text">กำลังจัดส่ง</span>
                    </div>
                </li>
                <li class="step">
                    <div class="step-content">
                        <span class="step-circle">4</span>
                        <span class="step-text"></span>
                    </div>
                </li>
            </ul>
        </div>';
    public static $status3 = '
        <div class="slide-container">
            <div class="mb-4">
                <h5>สถานะการจัดส่ง</h5>
            </div>
            <ul class="steps">
                <li class="step">
                    <div class="step-content step-success">
                        <span class="step-circle">1</span>
                        <span class="step-text">รับออเดอร์แล้ว</span>
                    </div>
                </li>
                <li class="step">
                    <div class="step-content step-success">
                        <span class="step-circle">2</span>
                        <span class="step-text">จัดสินค้าเเล้ว
                        </span>
                    </div>
                </li>
                <li class="step">
                    <div class="step-content step-success">
                        <span class="step-circle">3</span>
                        <span class="step-text">จัดส่งเเล้ว</span>
                    </div>
                </li>
                <li class="step">
                    <div class="step-content step-success">
                        <span class="step-circle">4</span>
                        <span class="step-text">สินค้าถึงคุณ</span>
                    </div>
                </li>
            </ul>
        </div>';
    public static $status4 = '
        <div class="slide-container">
            <div class="mb-4">
                <h5>สถานะการจัดส่ง</h5>
            </div>
            <ul class="steps">
                <li class="step">
                    <div class="step-content step-error">
                        <span class="step-circle">1</span>
                        <span class="step-text">ไม่รับออเดอร์</span>
                    </div>
                </li>
                <li class="step">
                    <div class="step-content">
                        <span class="step-circle">2</span>
                        <span class="step-text"></span>
                    </div>
                </li>
                <li class="step">
                    <div class="step-content">
                        <span class="step-circle">3</span>
                        <span class="step-text"></span>
                    </div>
                </li>
                <li class="step">
                    <div class="step-content">
                        <span class="step-circle">4</span>
                        <span class="step-text"></span>
                    </div>
                </li>
            </ul>
        </div>';

    public static $badge0 = '<span class="badge badge-gray pt-2 ps-2 pe-2 pb-2"><i class="fa-regular fa-clock"></i> รอรับออเดอร์</span>';
    public static $badge1 = '<span class="badge badge-warning pt-2 ps-2 pe-2 pb-2"><i class="fa-regular fa-clock"></i> กำลังเตรียมสินค้า</span>';
    public static $badge2 = '<span class="badge badge-warning pt-2 ps-2 pe-2 pb-2"><i class="fa-regular fa-clock"></i> กำลังจัดส่ง</span>';
    public static $badge3 = '<span class="badge badge-success pt-2 ps-2 pe-2 pb-2"><i class="fa-regular fa-circle-check"></i> จัดส่งสำเร็จ</span>';
    public static $badge4 = '<span class="badge badge-danger pt-2 ps-2 pe-2 pb-2"><i class="fa-regular fa-circle-xmark"></i> ไม่รับออเดอร์</span>';

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

    /* Get Data */

    public static function getUser($id){
        $stmt = dbconnect::connect()->prepare("SELECT * FROM user WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch();
        return $row;
    }

    public static function getAdmin($id){
        $stmt = dbconnect::connect()->prepare("SELECT * FROM admin WHERE id = :id");
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

    public static function getUserAll(){
        $stmt = dbconnect::connect()->prepare("SELECT * FROM user");
        $stmt->execute();
        $row = $stmt->rowCount();
        return $row;
    }

    public static function clearSession() {
        session_destroy();
    }

    public static function getProductTable(){
        $stmt = dbconnect::connect()->prepare("SELECT * FROM product");
        $stmt->execute();
        $row = $stmt->fetchAll();

        foreach($row as $val){
            echo '<tr>';
            echo '<td> <img src="'. api::base_url_json('assets/img/product/' . $val['img']) .'" alt="'. $val['name'] .'" class="img-circle img-size-32 mr-2"> '. $val['name'] .' </td>';
            echo '<td>'.$val['price']. " บาท".'</td>';
            echo '</tr>';
        }
    }

    public static function getOrderNew(){
        $stmt = dbconnect::connect()->prepare("SELECT * FROM orders WHERE order_status = '0' or order_status = '1' or order_status = '2'");
        $stmt->execute();
        $row = $stmt->rowCount();

        return $row;
    }

    public static function GetProductList(){
        if (isset($_SESSION['cart'])){
            foreach($_SESSION['cart'] as $key => $val){
                $data_product = api::getProduct($val['product_id']);
                $product_name = $data_product['name'];
                $product_price = $data_product['price'];
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

    public static function GetOrderListCheckOut($order_SeqNo){
        $data_order_product = api::getDataProductJsonDecode($order_SeqNo);
        foreach($data_order_product as $key => $value) {
            $data_product = api::getProduct($value->product_id);
            $productname = $data_product['name'];
            $productprice = $data_product['price'];
            $product_amount = $value->amount;
            $element = "<tr>
            <td>$productname</td>
            <td>$productprice</td>
            <td>$product_amount</td>
            </tr>";
            echo $element;
        }
    }

    public static function getDataProductJsonDecode($order_SeqNo){
        $stmt = dbconnect::connect()->prepare("SELECT * FROM `orders` WHERE order_SeqNo = :order_SeqNo");
        $stmt->execute([':order_SeqNo' => $order_SeqNo]);
        $row = $stmt->fetch();

        $order_data_product = $row['order_data'];
        $order_data_decode = json_decode($order_data_product);
        return $order_data_decode;
    }

    public static function getOrderList(){
        $stmt = dbconnect::connect()->prepare("SELECT * FROM orders WHERE order_status = '0' or order_status = '1' or order_status = '2'");
        $stmt->execute();
        $row = $stmt->fetchAll();
        if(!empty($row)){
            foreach($row as $val){
                $user_data = api::getUser($val['order_user_id']);
                $username = $user_data['name'] . " " . $user_data['surname'];
                $order_SeqNo = $val['order_SeqNo'];
                $order_at = $val['order_create'];
                $order_status = $val['order_status'];
                $status = api::checkOrderListStatus($order_SeqNo);
                // print_r($val);
                $element = "<tr>
                <td>$username</td>
                <td>$order_SeqNo</td>
                <td>$order_at</td>
                <td class='project-state'>
                $status
                </td>
                <td class='project-actions text-right'>
                    <a class='btn btn-info btn-sm' href='". Api::base_url_json('admin/readorder/'. $order_SeqNo) . "'>
                        <i class='fas fa-pencil-alt'>
                        </i>
                        อัพเดต
                    </a>
                    <button type='button' class='btn btn-danger btn-sm' onclick='deleteOrder(". $order_SeqNo .")'>
                        <i class='fas fa-trash'>
                        </i>
                        ลบ
                    </button>
                </td>
            </tr>";
            echo $element;
            }
        } else {
            $element = "<tr>
            <td class='dataTables-empty' colspan='5'>ไม่มี order ขณะนี้</td>
            </tr>";
            echo $element;
        }
    }

    public static function checkOrderListStatus($order_SeqNo){
        $stmt = dbconnect::connect()->prepare("SELECT * FROM orders WHERE order_SeqNo = :order_SeqNo ");
        $stmt->execute([':order_SeqNo' => $order_SeqNo]);
        $row = $stmt->fetch();

        $order_status = $row['order_status'];
        if ($order_status == 0){
            return api::$badge0;
        } else if ($order_status == 1){
            return api::$badge1;
        } else if ($order_status == 2){
            return api::$badge2;
        } else if ($order_status == 3){
            return api::$badge3;
        } else if ($order_status == 4){
            return api::$badge4;
        }
    }

    public static function getStatusOrder($order_SeqNo){
        $stmt = dbconnect::connect()->prepare("SELECT * FROM orders WHERE order_SeqNo = :order_SeqNo");
        $stmt->execute([':order_SeqNo' => $order_SeqNo]);
        $row = $stmt->fetch();

        $order_status = $row['order_status'];
        if ($order_status == 0){
            echo api::$status0;
        } else if ($order_status == 1){
            echo api::$status1;
        } else if ($order_status == 2){
            echo api::$status2;
        } else if ($order_status == 3){
            echo api::$status3;
        } else if ($order_status == 4){
            echo api::$status4;
        }
    }

    public static function getProductOrder($order_SeqNo){
        $data_order_product = api::getDataProductJsonDecode($order_SeqNo);
        foreach($data_order_product as $key => $value) {
            $data_product = Api::getProduct($value->product_id);
            $productimg = $data_product['img'];
            $productname = $data_product['name'];
            $productprice = $data_product['price'];
            $productimg = Api::base_url_json("assets/img/product/" . $productimg);
            $element = "
            <div class=\"card mb-3\">
                <div class=\"row g-0\">
                    <div class=\"col-md-2\">
                        <img src=$productimg alt=\"Image1\" class=\"img-fluid\">
                    </div>
                    <div class=\"col-md-5\">
                        <br>
                        <h5 class=\"pt-2\">$productname</h5>
                        <h5 class=\"pt-2\">ราคา $productprice บาท</h5>
                    </div>
                </div>
            </div>";
            echo $element;
        }
    }

    public static function elementEditOrder($order_SeqNo){
        $stmt = dbconnect::connect()->prepare("SELECT * FROM orders WHERE order_SeqNo = :order_SeqNo");
        $stmt->execute([':order_SeqNo' => $order_SeqNo]);
        $row = $stmt->fetch();
        $status0 = "<div class='card-body'>
        <h6>กรุณายืนยันรับออเดอร์</h6>
        <div class=' pt-2'>
            <button type='button' onclick=\"confirm('$order_SeqNo')\" class='btn btn-success'>รับออเดอร์</button>
            <button type='button' onclick=\"notconfirm('$order_SeqNo')\" class='btn btn-danger'>ไม่รับออเดอร์</button>
        </div>
        </div>";
        $status1 = "<div class='card-body'>
        <h6>กรุณาอัพเดตสถานะออเดอร์</h6>
        <div class=' pt-2'>
            <button type='button' onclick=\"finishedpreparing('$order_SeqNo')\" class='btn btn-success'>จัดเตรียมของสำเร็จ</button>
            <button type='button' onclick=\"notconfirm('$order_SeqNo')\" class='btn btn-danger'>ยกเลิกออเดอร์</button>
        </div>
        </div>";
        $status2 = "<div class='card-body'>
        <h6>กรุณาอัพเดตสถานะออเดอร์</h6>
        <div class=' pt-2'>
            <button type='button' onclick=\"finisheddelivery('$order_SeqNo')\" class='btn btn-success'>จัดส่งสำเร็จ</button>
            <button type='button' onclick=\"notconfirm('$order_SeqNo')\" class='btn btn-danger'>ยกเลิกออเดอร์</button>
        </div>
        </div>";
        if (!empty($row)) {
            if ($row['order_status'] == 0){
                echo $status0;
            } else if ($row['order_status'] == 1){
                echo $status1;
            }  else if ($row['order_status'] == 2){
                echo $status2;
            }
        }
    }

    public static function getProductTotal($order_SeqNo){
        $data_order_product = api::getDataProductJsonDecode($order_SeqNo);
        $total = 0;
        foreach($data_order_product as $key => $value) {
            $data_product = api::getProduct($value->product_id);
            $productprice = $data_product['price'];
            $total = $total + $productprice * $value->amount;
        }
        echo $total . " บาท";
    }

    public static function getProductListOrder($order_SeqNo){
        $data_order_product = api::getDataProductJsonDecode($order_SeqNo);
        $total = 0;
        foreach($data_order_product as $key => $value) {
            $data_product = Api::getProduct($value->product_id);
            $product_name = $data_product['name'];
            $product_price = $data_product['price'];
            $amount = $value->amount;
            $element = "<tr>
                <td>$product_name</td>
                <td>$product_price</td>
                <td>$amount</td>
            </tr>";
            echo $element;
        }
    }

    public static function getProductListAdmin(){
        $stmt = dbconnect::connect()->prepare("SELECT * FROM product");
        $stmt->execute();
        $row = $stmt->fetchAll();
        if(!empty($row)){
            foreach($row as $val){
                $product_id = $val['id'];
                $product_name = $val['name'];
                $product_price = $val['price'];
                $element = "<tr>
                <td> <img src='". Api::base_url_json('assets/img/product/' . $val['img']) ."' alt='". $val['name'] ."' class='img-circle img-size-32 mr-2'></td>
                <td>$product_name</td>
                <td>$product_price</td>
                </td>
                <td class='project-actions'>
                    <button type='button' class='btn btn-success btn-sm' onclick='EditOrder(". $product_id .")'>
                        <i class='fas fa-pencil-alt'>
                        </i>
                        แก้ไข
                    </button>
                    <button type='button' class='btn btn-danger btn-sm' onclick='deleteOrder(". $product_id .")'>
                        <i class='fas fa-trash'>
                        </i>
                        ลบ
                    </button>
                </td>
            </tr>";
            echo $element;
            }
        } else {
            $element = "<tr>
            <td class='dataTables-empty' colspan='5'>ไม่มี order ขณะนี้</td>
            </tr>";
            echo $element;
        }
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
                'href' => Api::base_url_json('')
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
                    'href' => Api::base_url_json('')
                );
    
                echo json_encode($response);
            } else {
                $_SESSION['cart'][] = $item_array;

                $response = array(
                    'status' => 'success',
                    'message' => 'เพิ่มสินค้าสำเร็จ',
                    'href' => Api::base_url_json('')
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
                $total =  $total + $product_data['price'] * $amount;
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
                'message' => 'ไม่มีข้อมูลสินค้า',
                'href' => '/'
            );
            echo json_encode($response);
        } else {
            $stmt  = dbconnect::connect()->prepare("INSERT INTO `orders`(`order_SeqNo`, `order_user_id`, `order_data`) VALUES ('$order_SeqNo','$user_id','$data_product')");
            $stmt->execute();
            unset($_SESSION['cart']);
            $_SESSION['order_SeqNo'] = $order_SeqNo;
            $response = array(
                'status' => 'success',
                'message' => 'เพิ่ม order เรียบร้อย',
                'href' => '/checkout'
            );
            echo json_encode($response);
        }
    }

    public static function deleteOrder($order_SeqNo){
        $stmt = dbconnect::connect()->prepare("DELETE FROM orders WHERE order_SeqNo = :order_SeqNo");
        $stmt->execute([':order_SeqNo' => $order_SeqNo]);
        
        $response = array(
            'status' => 'success',
            'message' => 'ลบ order เรียบร้อยเเล้ว',
            'href' => '/'
        );
        echo json_encode($response);
    }

    public static function confirmOrder($order_SeqNo){
        $stmt = dbconnect::connect()->prepare("UPDATE orders SET order_status = '1' WHERE order_SeqNo = :order_SeqNo");
        $stmt->execute([':order_SeqNo' => $order_SeqNo]);
        $response = array(
            'status' => 'success',
            'message' => 'รับ order เรียบร้อย',
            'href' => Api::base_url_json('admin/readorder/'.$order_SeqNo)
        );
        echo json_encode($response);
    }

    public static function notconfirmOrder($order_SeqNo){
        $stmt = dbconnect::connect()->prepare("UPDATE orders SET order_status = '4' WHERE order_SeqNo = :order_SeqNo");
        $stmt->execute([':order_SeqNo' => $order_SeqNo]);
        $response = array(
            'status' => 'success',
            'message' => 'ยกเลิก order เรียบร้อย',
            'href' => Api::base_url_json('admin/order')
        );
        echo json_encode($response);
    }

    public static function finishedpreparing($order_SeqNo){
        $stmt = dbconnect::connect()->prepare("UPDATE orders SET order_status = '2' WHERE order_SeqNo = :order_SeqNo");
        $stmt->execute([':order_SeqNo' => $order_SeqNo]);
        $response = array(
            'status' => 'success',
            'message' => 'อัพเดต order เรียบร้อย',
            'href' => Api::base_url_json('admin/readorder/'.$order_SeqNo)
        );
        echo json_encode($response);
    }

    public static function finisheddelivery($order_SeqNo){
        $stmt = dbconnect::connect()->prepare("UPDATE orders SET order_status = '3' WHERE order_SeqNo = :order_SeqNo");
        $stmt->execute([':order_SeqNo' => $order_SeqNo]);
        $response = array(
            'status' => 'success',
            'message' => 'อัพเดต order เรียบร้อย',
            'href' => Api::base_url_json('admin/readorder/'.$order_SeqNo)
        );
        echo json_encode($response);
    }

    public static function checkOrderNewNav(){
        $stmt = dbconnect::connect()->prepare("SELECT * FROM orders WHERE order_status = '0' or order_status = '1' or order_status = '2'");
        $stmt->execute();
        $row = $stmt->fetchAll();
        if (!empty($row)){
            echo '<span class="right badge badge-danger">New</span>';
        }
    }

    public static function cartElement($product_id){
        $product_data = api::getProduct($product_id);
        $productimg = $product_data['img'];
        $productname = $product_data['name'];
        $productprice = $product_data['price'];
        $productimg = api::base_url_json("assets/img/product/" . $productimg);
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $value) {
                $count = $_SESSION['cart'][$key]['amount'];
            }
        }
        $element = "
            <div class=\"card mb-3\">
                <div class=\"row g-0\">
                    <div class=\"col-md-3 d-flex\">
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

    /* Update Payment */

    public static function Update_Payment(){
        $stmt = dbconnect::connect()->prepare("UPDATE `orders` SET `id`='[value-1]',`order_SeqNo`='[value-2]',`order_user_id`='[value-3]',`order_data`='[value-4]',`order_payment_img`='[value-5]',`order_status`='[value-6]',`order_create`='[value-7]' WHERE 1");
        
    }
}

?>