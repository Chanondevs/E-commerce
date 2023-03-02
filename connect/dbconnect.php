<?php

namespace db;

use Dotenv\Dotenv;
use PDO;

require __DIR__. '/../vendor/autoload.php';
$part = str_replace("connect", "", __DIR__);
$dotenv = Dotenv::createImmutable($part);
$dotenv->load();

class dbconnect {

    public static function connect(){
        $dns = "mysql:host=".$_ENV['HOST'].";dbname=".$_ENV['DATABASENAME'].";charset=utf8";
        $connect = new PDO($dns, $_ENV['USERNAME'], $_ENV['PASSWORD']);
        $connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connect;
    }

}

?>