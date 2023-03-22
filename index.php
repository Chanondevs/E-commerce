<?php
header('Access-Control-Allow-Origin: *');

use api\api;
use api\auth;
use db\dbconnect;
use AltoRouter as Router;

require __DIR__.'/vendor/autoload.php';
require_once 'api/message.php';
require_once 'api/api.php';
require_once 'api/auth.php';
require_once 'connect/dbconnect.php';
require_once 'api/enum/api.php';
?>
<body>

<?php

$router = new Router();

/** Index Page */
$router->map( "GET", "/", function() {
    require_once __DIR__ .  '/page/index.php';
});

/** Test Page */
$router->map( "GET", "/test/", function() {
    require_once __DIR__ .  '/Test/index.php';
});

$router->map( "GET", "/cart", function() {
    require_once __DIR__ .  '/page/cart.php';
});

/** Checkout Page */
$router->map( "GET", "/checkout", function() {
    require_once __DIR__ .  '/page/checkout.php';
});

/** Login Page */
$router->map( "GET", "/login", function() {
    require_once __DIR__ .  '/page/login.php';
});

/** Logout Page */
$router->map( "GET", "/logout/", function() {
    require_once __DIR__ .  '/page/logout.php';
});

/** Login Admin Page */
$router->map( "GET", "/loginadmin/", function() {
    require_once __DIR__ .  '/page/loginadmin.php';
});

/** Admin Page */
$router->map( "GET", "/admin/", function() {
    require_once __DIR__ .  '/page/admin/home.php';
});

/** Order Page */
$router->map( "GET", "/admin/order", function() {
    require_once __DIR__ .  '/page/admin/order.php';
});

/** Order Page */
$router->map( "GET", "/admin/edit-user", function() {
    require_once __DIR__ .  '/page/admin/edit-user.php';
});

/** Order Page */
$router->map( "GET", "/admin/readorder/[a:order_SeqNo]", function($order_SeqNo) {
    require_once __DIR__ .  '/page/admin/readorder.php';
});
  

$match = $router->match();
if( is_array($match) && is_callable( $match['target'] ) ) {
  call_user_func_array( $match['target'], $match['params'] );
} else {
  require_once __DIR__ . '/page/error.php';
}
?>

</body>
</html>