<?php $title = 'Displaying all users'; ?>

<?php
if (isset($_GET['page'])){
    $id = "index.php?action=listUsers&amp;id=" . $_GET['id'];
    $page = $_GET['page'];

    // Prev + Next
    $prev = $page - 1;
    $next = $page + 1;
} elseif (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = "index.php?action=listUsers&amp;id=" . $_GET['id'];
    $admin = "index.php?id=" . $_GET['id'];
    $page = 0;
}
?>
<?php ob_start(); ?>

    <link href="public/css/users.css" rel="stylesheet" />

    <p><a href="index.php?id=3" class="btn btn-primary">back to admin interface</a></p>

    <table class="table table-inverse table-responsive">
        <thead class="table">
        <tr>
            <th scope="col">uuid</th>
            <th scope="col">username</th>
            <th scope="col">full_name</th>
            <th scope="col">email</th>
            <th scope="col">role</th>
            <th scope="col">creation_date</th>
            <th scope="col">action</th>

        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($users as $user) {
            ?>
            <tr>

                <td scope="row"><?= nl2br(htmlspecialchars($user['uuid'])) ?></td>
                <td><?= nl2br(htmlspecialchars($user['username'])) ?></td>
                <td><?= nl2br(htmlspecialchars($user['full_name'])) ?></td>
                <td><?= nl2br(htmlspecialchars($user['email'])) ?></td>
                <td><?= (($user['admin']) == "0") ? "GUEST" : "ADM" ?></td>
                <td><?= nl2br(htmlspecialchars($user['creation_date_fr'])) ?></td>
                <td>
                    <ul>
                        <li>
                            <em><a href="index.php?action=user&amp;id=<?= $user['id'] ?>">Edit</a></em>
                        </li>
                        <li>
                            <em><a href="index.php?action=user&amp;id=<?= $user['id'] ?>">Delete</a></em>

                        </li>
                    </ul>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

    <!-- Pagination -->

    <nav aria-label="Page navigation example mt-5">
        <ul class="pagination justify-content-center">
            <li class="page-item <?php if ($page <= 1) {
                echo 'disabled';
            } ?>">
                <a class="page-link"
                   href="<?php if ($page <= -1) {
                       echo '#';
                   } else {
                       echo "$id&page=" . $prev;
                   } ?>">Previous</a>
            </li>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?php if ($page == $i) {
                    echo 'active';
                } ?>">
                    <a class="page-link" href="<?= $id ?>&amp;page=<?= $i; ?>"> <?= $i; ?> </a>
                </li>
            <?php endfor; ?>

            <li class="page-item <?php if ($page >= $totalPages) {
                echo 'disabled';
            } ?>">
                <a class="page-link"
                   href="<?php if ($page >= $totalPages) {
                       echo '#';
                   } else {
                       echo "$id&page=" . $next;

                   } ?>">Next</a>
            </li>
        </ul>
    </nav>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>