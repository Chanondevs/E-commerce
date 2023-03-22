<?php

use api\api;

require_once("../api/api.php");
require_once("../connect/dbconnect.php");

$id = $_POST['id'];

api::GetDataUser($id);
?>
