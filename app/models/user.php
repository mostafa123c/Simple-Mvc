<?php 

namespace MVC\models;
use MVC\core\model;

class user extends model{

    public function getallusers()
    {
        $data = model::db()->run("SELECT * FROM user");
        return $data;
    }

    
    public function getuser($email,$password)
    {
        $data = model::db()->row("SELECT * FROM user WHERE `email`='$email' && `password`='$password'");
        return $data;
    }


}