<?php 

use api\api;

require_once("../api/api.php");
require_once("../connect/dbconnect.php");

$order_product = $_POST['data'];
$user_id = $_SESSION['user_id'];

$order_data_product = json_encode($order_product);

api::addOrder($user_id, $order_data_product);

?>