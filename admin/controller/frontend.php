<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UsersManager.php');
require_once('model/AdminManager.php');
require_once('model/ProductsManager.php');
require_once('model/CategoriesManager.php');


// ADMIN
function admin()
{
    // http://localhost/Rendu/my_shop/admin/index.php?id=2
    $adminManager = new \MyShop\Admin\Model\AdminManager();
    $admin = $adminManager->checkRole($_GET['id']);

    require('view/frontend/adminView.php');
}

// USERS
function listUsers($limit = 0)
{
    $userManager = new \MyShop\Admin\Model\UsersManager();
    $totalPages = $userManager->totalPages();
    $users = $userManager->getUsers($limit);

    require('view/frontend/listUsersView.php');
}


function user()
{
    $userManager = new \MyShop\Admin\Model\UsersManager();

    $user = $userManager->getUser($_GET['id']);


    require('view/frontend/userView.php');
}

function editUser($id)
{
    $products = array();
    $userManager = new \MyShop\Admin\Model\UsersManager();

    // $products & $category used in template !
    //$products = $productManager->getProduct($_GET['id']);
    $user = $userManager->getUser($id);
    $user['id'] = $id;

    require('view/frontend/editUserView.php');
}

// PRODUCTS
function listProducts()
{
    $productManager = new \MyShop\Admin\Model\ProductsManager();
    $products = $productManager->getProducts();
    require('view/frontend/listProductsView.php');
}

function editProduct($id)
{
    $products = array();
    $productManager = new \MyShop\Admin\Model\ProductsManager();
    $categoriesManager = new \MyShop\Admin\Model\CategoriesManager();

    // $products & $category used in template !
    //$products = $productManager->getProduct($_GET['id']);
    $products = $productManager->getProduct($id);
    $products['id'] = $id;
    $category = $categoriesManager->getCategories();

    require('view/frontend/editProductView.php');
}

function updateUser($userId, $username, $full_name, $password, $email, $admin, $picture)
{
    $usersManager = new \MyShop\Admin\Model\UsersManager();

    $affectedLines = $usersManager->updateUser($userId, $username, $full_name, $password, $email, $admin, $picture);

    if ($affectedLines === false) {
        throw new Exception('Cannot update the user !');
    } else {
        header('Location: index.php?action=listUsers&id=' . $userId);
    }
}

function deleteProduct()
{
    $productManager = new \MyShop\Admin\Model\ProductsManager();
    $affectedLines = $productManager->delProduct($_GET['id']);


    if ($affectedLines === false) {
        throw new Exception('Cannot delete the product !');
    } else {
        header('Location: index.php?action=listProducts&id=' . $_GET['id']);
    }

}

// POST PRODUCT

function updateProduct($productId, $picture, $product, $category, $price, $rate, $description)
{
    $productManager = new \MyShop\Admin\Model\ProductsManager();

    $affectedLines = $productManager->updateProduct($productId, $product, $category, $price, $picture, $rate, $description);

    if ($affectedLines === false) {
        throw new Exception('Cannot update the product !');
    } else {
        header('Location: index.php?action=listProducts&id=' . $productId);
    }
}

function addProduct()
{
    $productManager = new \MyShop\Admin\Model\ProductsManager();

    $affectedLines = $productManager->addProduct();

    if ($affectedLines === false) {
        throw new Exception('Cannot add the product !');
    } else {
        $_GET['id'] = $affectedLines;
        // http://localhost/Rendu/my_shop/admin/index.php?action=editProduct&id=2
        header('Location: index.php?action=editProduct&id=' . $affectedLines);
    }
}


// POST description
function listPosts()
{
    $postManager = new \MyShop\Admin\Model\PostManager();
    $posts = $postManager->getPosts();

    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new \MyShop\Admin\Model\PostManager();
    $commentManager = new \MyShop\Admin\Model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');

}

function addComment($postId, $author, $comment)
{
    $commentManager = new \MyShop\Admin\Model\CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    } else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}
