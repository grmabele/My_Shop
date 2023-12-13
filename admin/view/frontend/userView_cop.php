<?php $title = htmlspecialchars("Editing a user"); ?>
<link href="public/css/admin.css" rel="stylesheet"/>

<?php ob_start(); ?>
<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = "index.php?action=listUsers&amp;id=" . $_GET['id'];
    $admin = "index.php?id=" . $_GET['id'];
}
?>

<script src="http://localhost/Rendu/my_shop/admin/public/js/uplaod_file.js"></script>
<div id="dropfile">Drop an image from your computer</div>
<input type="file" onchange="showFile()" accept="image/*"><br><br>

<p><a href="index.php?id=3" class="btn btn-primary">back to admin interface</a></p>

<div class="users">


    <div class="card" style="width: 24rem;">
        <img id="card_thumbnail" class="card-img-top" src="<?= nl2br(htmlspecialchars($user['card_image'])) ?>" alt="Ajouter une photo pour personnaliser votre compte"
             style="height: 200px; background-color: rgb(233, 236, 239);">
        <input class="btn btn-primary" type="file" onchange="showFile()" accept="image/*"><br><br>

        <div class="card-body">
            <h5 class="card-title"><?= nl2br(htmlspecialchars($user['username'])) ?></h5>

            <form action="" method="post">
                <input type="hidden" name="image" value="<?= nl2br(htmlspecialchars($user['card_image'])) ?>" required>
                <input type="name" name="name" placeholder="NOM" minlength="3" maxlength="30" value="<?= nl2br(htmlspecialchars($user['full_name'])) ?>" required>
                <input type="email" name="email" placeholder="ADRESSES E-MAIL"
                       value="<?= nl2br(htmlspecialchars($user['email'])) ?>" required>
                <input type="password" name="password" placeholder="MOT DE PASSE"
                       value="<?= nl2br(htmlspecialchars($user['password'])) ?>" required>
                <input type="password" name="password_confirmation" placeholder="CONFIRMATION MOT DE PASSE" value="<?= nl2br(htmlspecialchars($user['password'])) ?>" required>
                <input type="role" name="role" placeholder="role" value="<?= ( ($user['admin']) == "0") ? "GUEST": "ADM" ?>" required>
                <input type="hidden" name="creation_date" value="<?= time() ?>">
                <button type="submit">Submit</button>
            </form>

            <br><i><p class="card-text">Dernière modification: <?= htmlspecialchars($user['creation_date_fr']) ?></p></i>

        </div>
    </div>
</div>
<?php
    $CheminFichier = '/emplacement_sur_votre_serveur/ztest.jpg';
   // file_put_contents($CheminFichier, $decodedData) ;
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
