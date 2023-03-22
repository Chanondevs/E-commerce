<?php 

use auth\Auth;
use api\Api;

require_once("../api/api.php");
require_once("../connect/dbconnect.php");

$product_id = $_POST['id'];

api::increaseCart($product_id);

?>