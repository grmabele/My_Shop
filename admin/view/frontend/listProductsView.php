<?php $title = 'Displaying all users'; ?>
    <link href="public/css/products.css" rel="stylesheet"/>
    <link href="public/css/delete.css" rel="stylesheet"/>
<?php ob_start(); ?>

    <p><a href="index.php?id=3" class="btn btn-primary">back to admin interface</a></p>
    <p><a href="index.php?action=addProduct" class="btn btn-primary">Add</a></p>

    <table class="products">
        <thead>
        <tr>
            <th scope="col">picture</th>
            <th scope="col">name</th>
            <th scope="col">product</th>
            <th scope="col">category</th>
            <th scope="col">price</th>
            <th scope="col">rate</th>
            <th scope="col">description</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($data = $products->fetch()) {
            ?>
            <tr>

                <td scope="row"><?= nl2br(htmlspecialchars($data['picture'])) ?></td>
                <td><?= nl2br(htmlspecialchars($data['product'])) ?></td>
                <td><?= nl2br(htmlspecialchars($data['category'])) ?></td>
                <td><?= nl2br(htmlspecialchars($data['price'])) ?></td>
                <td><?= nl2br(htmlspecialchars($data['rate'])) ?></td>
                <td><?= nl2br(htmlspecialchars($data['description'])) ?></td>
                <td>
                    <ul>
                        <li>
                            <em><a href="index.php?action=editProduct&amp;id=<?= $data['id'] ?>" class="btn btn-primary">Edit</a></em>
                        </li>
                        <em><a href="index.php?action=deleteProduct&id=<?= $data['id'] ?>" class="btn btn-primary">Delete</a></em>
                        </li>
                    </ul>
                </td>
            </tr>
            <?php
        }
        // $products->closeCursor();
        ?>
        </tbody>
    </table>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>