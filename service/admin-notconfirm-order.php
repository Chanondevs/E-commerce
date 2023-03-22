<?php 

use api\api;

require_once("../api/api.php");
require_once("../api/auth.php");
require_once("../connect/dbconnect.php");

$order_SeqNo = $_POST['order_SeqNo'];

api::notconfirmOrder($order_SeqNo);

?>