<?php $title = 'My Shop'; ?>

<?php ob_start(); ?>



   <div class="admin">

        <?php

        $adm_menu = '
    <h1>ADMINISTRATION INTERFACE</h1>
  
    <p> Welcome' . $admin["full_name"] . ' </p>
    <p><a href=index.php?action=listUsers&amp;id=' . $admin["id"] . ' class="btn btn-primary">Displaying all users</a></p>
    <p><a href=index.php?action=listProducts&amp;id=' . $admin["id"] . ' class="btn btn-primary">Displaying all products</a></p>
        '; ?>
        <?= (($admin['role']) == "0" || $admin == false) ? "<h1>Your are not authorized to login with credentials. <br>You will be redirected to page in few seconds!</h1>" : "<p>$adm_menu</p>" ?>

    </div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>