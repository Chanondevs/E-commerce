<?php

use api\admin;
require_once __DIR__ . "../../../api/admin.php";

echo "admin user";

echo "<pre>";
print_r(admin::getAdmin('1'));

?>