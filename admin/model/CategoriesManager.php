<?php

namespace MyShop\Admin\Model;

require_once("model/Manager.php");

class CategoriesManager extends Manager
{
    public function getCategories()
    {
        $db = $this->dbConnect();
        $req = $db->query('select id, name from categories;');

        return $req->fetchAll();
    }

}