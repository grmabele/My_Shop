<?php $title = htmlspecialchars("Editing a product"); ?>
<link href="public/css/edit.css" rel="stylesheet"/>

<?php ob_start(); ?>
<script src="http://localhost/Rendu/my_shop/admin/public/js/uplaod_file.js"></script>
<h1>EDIT</h1>

<p><a href="index.php?id=3" class="btn btn-primary">back to admin interface</a></p>

<div id="dropfile"></div>

<div class="products">

    <div class="card" style="width: 24rem;">
        <img id="card_thumbnail" class="card-img-top" src="<?=  ($products['picture'] != "") ? '../admin/public/images/' . nl2br(htmlspecialchars($products['picture'])): "../admin/public/images/insert-picture-here.jpg" ?>">
        <input class="btn btn-primary" type="file" onchange="showFile()" accept="image/*"><br><br>

        <div class="card-body">
            <h5 class="card-title"><?= nl2br(htmlspecialchars($products['username'])) ?></h5>

            <form action="index.php?action=updateProduct&amp;id=<?= $products['id'] ?>" method="post">
                <input type="hidden" name="id" value="<?= nl2br(htmlspecialchars($products['id'])) ?>" readonly required>
                <input id="post_picture" type="hidden" name="picture" value="<?= nl2br(htmlspecialchars($products['picture'])) ?>"
                       required>
                <br><label for="product">Product:</label><br>
                <input type="product" name="product" placeholder="PRODUCT" minlength="3" maxlength="20"
                       value="<?= nl2br(htmlspecialchars($products['product'])) ?>" required>
                <br><label for="categories">Category</label><br>
                <input id="categories" type="text" list="categorydata" name="categories"
                       value="<?= nl2br(htmlspecialchars($products['category'])) ?>" required>
                <datalist id="categorydata">
                    <br><label for="category">Category: </label><br>
                    <select name="category" id="category">
                        <?php foreach ($category as $key => $value) {
                            if ($products['category'] == $key) { ?>
                                <option value="<?= $value["id"] ?>" selected="selected"
                                        hidden="visible"><?= $value["name"] ?></option>
                                <?php
                            } else { ?>
                                <option value="<?= $value["id"] ?>"><?= $value["name"] ?></option>
                                <?php
                            }
                        }
                        ?>

                    </select>
                </datalist>
                <!-- <label for="category">Category:</label>
              <input type="category" name="category" placeholder="CATEGORY"
                       value="<? /*= nl2br(htmlspecialchars($products['category'])) */ ?>" required>-->
                <br><label for="price">Price:</label><br>
                <input type="price" name="price" placeholder="PRICE"
                       value="<?= nl2br(htmlspecialchars($products['price'])) ?>" required>
                <br><label for="rate">Rate:</label><br>
                <input type="rate" name="rate" placeholder="RATE"
                       value="<?= nl2br(htmlspecialchars($products['rate'])) ?>" required>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="5"
                              placeholder="Enter a description here..."><?= nl2br(htmlspecialchars($products['description'])) ?></textarea>
                </div>
                <input type="hidden" name="creation_date" value="<?= time() ?>">
                <button type="submit">Submit</button>
            </form>

            <!--            <br><i><p class="card-text">Dernière modification: -->
            <? //= htmlspecialchars($products['creation_date_fr']) ?><!--</p></i>-->

        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
