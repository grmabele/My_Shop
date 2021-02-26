<?php

namespace MyShop\Admin\Model;

require_once("model/Manager.php");

class AdminManager extends Manager
{
    public function checkRole($userId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, full_name, admin as "role" FROM users where id = ?');
        $req->execute(array($userId));
        $admin = $req->fetch();
        return $admin;
    }
}