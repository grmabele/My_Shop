<?php
require('controller/frontend.php');

try {
    if (isset($_GET['action'])) {
        // USERS
        // http://localhost/Rendu/my_shop/admin/index.php?action=listUsers
        switch ($_GET['action']) {
            case 'listUsers':
                if (isset($_GET['page'])) {
                    listUsers($_GET['page']);
                } else {
                    listUsers();
                }
                break;
            case 'user':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    user();
                } else {
                    throw new Exception('Cannot list users');
                }
                break;
            case 'editUser':
                if (isset($_GET['id']) && $_GET['id'] > 0) {

                    editUser($_GET['id']);
                    break;
                } else {
                    throw new Exception('Cannot edit user');
                }
            case 'updateUser':
                if (isset($_POST['id'])) {
                    if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['admin']) && !empty($_POST['full_name'])) {
                        // function updateUser($userId, $username, $full_name, $password, $email, $admin, $picture) void
                        updateUser($_POST['id'], $_POST['username'], $_POST['full_name'], $_POST['password'], $_POST['email'], $_POST['admin'], $_POST['picture']);
                    } else {
                        throw new Exception('Tous les champs ne sont pas remplis !');
                    }
                } else {
                    throw new Exception('Cannot update the user');
                }
                break;
            case 'listProducts':
                    listProducts();
                    break;
            case 'addProduct':
                    addProduct();
            case 'editProduct':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    // http://localhost/Rendu/my_shop/admin/index.php?action=product&id=1
                    editProduct($_GET['id']);
                    break;
                } else {
                    throw new Exception('Cannot edit product');
                }
            case 'updateProduct':
                // UPDATE PRODUCT (image product category price rate description)
                // updateProduct($productId, $name, $product, $price, $picture, $rate, $description)
                if (isset($_POST['id'])) {
                    if (!empty($_POST['product']) && !empty($_POST['category']) && !empty($_POST['price']) && !empty($_POST['rate']) && !empty($_POST['description'])) {
                        updateProduct($_POST['id'], $_POST['picture'], $_POST['product'], $_POST['category'], $_POST['price'], $_POST['rate'], $_POST['description']);
                    } else {
                        throw new Exception('Tous les champs ne sont pas remplis !');
                    }
                } else {
                    throw new Exception('Cannot update the product');
                }
                break;
            case 'deleteProduct':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    // http://localhost/Rendu/my_shop/admin/index.php?action=deleteProduct&id=1
                    deleteProduct();
                } else {
                    throw new Exception('Cannot delete the product');
                }
                break;
            case 'listPosts':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    listProducts();
                } else {
                    throw new Exception('Cannot list posts');
                }
                break;
            default:
                admin();

        }

    }else {
        admin();
    }
    /*
        if ($_GET['action'] == 'listUsers') {
            if (isset($_GET['page'])) {
                listUsers($_GET['page']);
            } else {
                listUsers();
            }
        } elseif ($_GET['action'] == 'user') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                user();
            } else {
                throw new Exception('Cannot list users');
            }
        }
        // PRODUCTS
        // http://localhost/Rendu/my_shop/admin/index.php?action=products
        if ($_GET['action'] == 'listProducts') {
            listProducts();
        }elseif ($_GET['action'] == 'addProduct') {
            addProduct();
        }        elseif ($_GET['action'] == 'editProduct') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                // http://localhost/Rendu/my_shop/admin/index.php?action=product&id=1
                editProduct();
            } else {
                throw new Exception('Cannot list products');
            }
        }
        elseif ($_GET['action'] == 'updateProduct') {
            // UPDATE PRODUCT (image product category price rate description)
            // updateProduct($productId, $name, $product, $price, $picture, $rate, $description)
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['picture']) && !empty($_POST['product']) && !empty($_POST['category']) && !empty($_POST['price']) && !empty($_POST['rate']) && !empty($_POST['description'])) {
                    updateProduct($_GET['id'], $_POST['picture'], $_POST['product'], $_POST['category'], $_POST['price'], $_POST['rate'], $_POST['description']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Cannot update the product');
            }
        } elseif ($_GET['action'] == 'deleteProduct') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                // http://localhost/Rendu/my_shop/admin/index.php?action=deleteProduct&id=1
                deleteProduct();
            } else {
                throw new Exception('Cannot delete the product');
            }
        }


        if ($_GET['action'] == 'listPosts') {
            listPosts();
        } elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            } else {
                throw new Exception('Cannot list posts');
            }
        } elseif ($_GET['action'] == 'adddescription') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['description'])) {
                    adddescription($_GET['id'], $_POST['author'], $_POST['description']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Aucun identifiant trouvé');
            }
        }
    } else {
        admin();
        //listPosts();
    }
    */
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
