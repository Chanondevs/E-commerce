<?php 

use api\api;

require_once("../api/api.php");
require_once("../connect/dbconnect.php");

$product_id = $_POST['id'];

Api::addCart($product_id);

?>