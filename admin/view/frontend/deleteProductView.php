<?php $title = htmlspecialchars("Delete a product"); ?>
<link href="public/css/delete_product.css" rel="stylesheet" />

<?php ob_start(); ?>

<strong>Delete product!</strong> This action is permanent. Think twice before proceeding!

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>


