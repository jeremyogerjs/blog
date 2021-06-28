<?php require("./helper/db-connect.php");
require("./functions/tags/getAllTag.php");
ob_start();
session_start();
?>
<h3>Listes des tags</h3>
<div class="col-4">
    <table class="table">
    <thead>
        <tr>
        <th scope="col">Tag Name</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($results as $tag) : ?>
        <tr>
        <td><?= $tag['tagName'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('./views/templateAdmin.php'); ?>
