<?php
header('Content-Type: text/html; charset=utf-8');

use api\api;
use api\auth;
use api\admin;
use chillerlan\QRCode\QRCode;
use db\dbconnect;


// $data = $_SESSION;
// $dataen = json_encode($data);
// echo "<pre>"; print_r(json_decode($dataen));

echo "<pre>"; print_r($_SESSION);

// $data_cart = $_SESSION['cart'];
// $data_product = json_encode($data_cart);

// api::addCart('1');
// api::increaseCart('1');
// api::CartEmpty();
// api::removeCart('1');
// print_r(api::total());
// print_r(api::genNoOrder());
// print_r($data_product);
// api::addOrder($_SESSION['user_id'], $data_product);
// print_r(api::getDataProductJsonDecode('P78757312'));
// print_r(api::getProduct('1'));
// api::clearSession();
// echo "<pre>"; Api::TestEnum();
?>