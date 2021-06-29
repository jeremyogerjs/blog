<?php 
session_start();
require("./helper/db-connect.php");
require("./functions/tags/getAllTag.php");
ob_start();

?>
<h3>Listes des tags</h3>
<button class="btn btn-success"><a href="" class="text-white text-decoration-none">Creer Tag</a></button>
<?php if(isset($msg)) : ?>
    <div class="alert alert-info" role="alert">
        <?= $msg ?>
    </div>
<?php endif; ?>
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
            <td>
                <span><a href="index.php?action=delTag&id=<?= $tag['id'] ?>" class="text-danger me-2"><i class="fas fa-trash"></a></i></span>
                <span><a href="index.php?action=editTag&id=<?= $tag['id'] ?>" class="text-primary"><i class="fas fa-pencil-alt"></i></a></span>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('./views/templateAdmin.php'); ?>
