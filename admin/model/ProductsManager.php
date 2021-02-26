<?php

namespace MyShop\Admin\Model;

require_once("model/Manager.php");

class ProductsManager extends Manager
{
    // GET
    public function getProducts()
    {
        $db = $this->dbConnect();
        $req = $db->query('select  p.id , p.img as picture, p.name as product,  c.name as category,  p.price, p.rate, p.description as description from products as p join categories c on c.id = p.category_id;');

        return $req;
    }

    public function getProduct($productId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('select  p.id, p.img as picture , p.name as product, c.name as category,  p.price, p.rate, p.description as description from products as p join categories c on c.id = p.category_id WHERE p.id = ?');
        $req->execute(array($productId));
        $product = $req->fetch();

        return $product;
    }

    // DELETE
    public function delProduct($productId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM products WHERE id = ?');
        $req->execute(array($productId));
        $req= $req->fetch();
        return $req;
    }

    // UPDATE PRODUCT (image product category price rate description)
    public function updateProduct($productId,$product, $category, $price, $picture, $rate, $description)
    {
        $db = $this->dbConnect();
        // insert into products(name, price, category_id, img, rate, description, description_date) VALUES  ("toto", 22, 2, "55.jpg", 7, "blabla", now())
        $descriptions = $db->prepare('UPDATE products SET name = ?, price = ?, category_id = ?, img = ?, rate = ?, description = ?, description_date = NOW() WHERE id= ? ')   ;
        $affectedLines = $descriptions->execute(array($product, $price, $category, $picture, $rate, $description, $productId));
        return $affectedLines;
    }

    public function addProduct()
    {
        $db = $this->dbConnect();

        $descriptions = $db->prepare('INSERT INTO products( name, price, category_id, img, rate, description, description_date) VALUES( DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, NOW())')   ;
        $descriptions->execute();
        $lastId=  $db->lastInsertId();
        return $lastId;
    }

}