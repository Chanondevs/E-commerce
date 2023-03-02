<?php 

namespace api;

use db\dbconnect;

class admin {

    public static function getAdmin($id){
        $stmt = dbconnect::connect()->prepare("SELECT * FROM admin WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch();
        return $row;
    }

}


?>