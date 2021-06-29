<?php 
session_start();
require("./helper/db-connect.php");
require("./functions/categories/getAllCategories.php");
ob_start();

?>
<h3>Listes des Catégories !!!</h3>
<button class="btn btn-success"><a href="" class="text-white text-decoration-none">Creer Catégorie</a></button>
<div class="col-4">
    <table class="table">
    <thead>
        <tr>
        <th scope="col">Catégorie Name</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($results as $categorie) : ?>
        <tr>
            <td><?= $categorie['catName'] ?></td>
            <td>
                <span><a href="index.php?action=delCat&id=<?= $categorie['id'] ?>" class="text-danger me-2"><i class="fas fa-trash"></a></i></span>
                <span><a href="index.php?action=editCat&id=<?= $categorie['id'] ?>" class="text-primary"><i class="fas fa-pencil-alt"></i></a></span>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('./views/templateAdmin.php'); ?>
