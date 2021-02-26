<?php

namespace MyShop\Admin\Model;

require_once("model/Manager.php");

class UsersManager extends Manager
{
    public function getUsers(int $limit)
    {
        $min = $limit * 20;
        $max = $min + 20;
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, uuid, username, email, admin, full_name, DATE_FORMAT(creation_date, "%d/%m/%Y à %Hh%imin%ss") AS creation_date_fr FROM users WHERE id BETWEEN ' . $min . ' AND ' . $max . ' ORDER BY creation_date DESC');
        $req->execute(array($min, $max));

        //$req = $db->prepare($sql);
        //$req->execute();
        $users = $req->fetchAll();
        return $users;
    }

    public function getUser($userId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, username, full_name, card_image, password, uuid, email, admin, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM users WHERE id = ?');
        $req->execute(array($userId));
        $user = $req->fetch();

        return $user;
    }

    public function updateUser($userId, $username, $full_name, $password, $email, $admin, $picture)
    {
        $db = $this->dbConnect();

        $descriptions = $db->prepare('UPDATE users SET username = ?, full_name = ?, password = ?, email = ?, admin = ?, picture = ?, description_date = NOW() WHERE id= ? ')   ;
        $affectedLines = $descriptions->execute(array($username, $full_name, $password, $email, $admin, $picture, $userId));
        return $affectedLines;
    }

    public function totalPages()
    {
        // Get total records
        $db = $this->dbConnect();
        $req = $db->query('SELECT count(id) AS id FROM users');
        $req = $req->fetch();
        $allRecords = $req['id'];


        $totalPages = (int)ceil($allRecords / 20)-1;
        // Calculate total pages
        return $totalPages;
    }
}