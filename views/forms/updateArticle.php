<?php 
session_start();
ob_start(); 
// Demarrage pour chaque fichier views
require("./functions/categories/getAllCategories.php");
require('functions/posts/getSinglePost.php');
?> 
<?php if(isset($msg)) : ?>
  <p><?= $msg ?></p>
<?php endif;?>
<form method="POST" action="index.php?action=updatePost&id=<?= $_GET['id']; ?>">
  <div class="mb-3">
    <label for="title" class="form-label">Titre de l'article</label>
    <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelp">
    <div id="titleHelp" class="form-text">Titre actuel : <?= $result['title'] ?></div>
  </div>
  <div class="mb-3 d-flex flex-column">
    <label for="content" class="form-label">Content</label>
    <textarea name="content" id="content" cols="100" rows="5"><?= $result['content'] ?></textarea>
  </div>
  <div class="mb-3">
    <label for="createdDate" class="form-label">Date de création</label>
    <input type="date" class="form-control" name="createdDate" id="createdDate" aria-describedby="createdDateHelp">
    <div id="createdDateHelp" class="form-text">Date création actuel : <?= $result['createdDate'] ?></div>
  </div>
  <select class="form-select" name="idCategory" aria-label="Default select example" aria-describedby="categorieHelp">
    <option selected>Selectionner la catégorie</option>
    <?php foreach($results as $categorie) : ?>
        <option value="<?= $categorie['id'] ?>"><?= $categorie['catName'] ?></option>
    <?php endforeach; ?>
</select>
    <div id="categorieHelp" class="form-text">Catégorie actuel : <?= $result['catName'] ?></div>
  <button type="submit" class="btn btn-primary my-3">Edit</button>
  <button type="submit" class="btn btn-warning my-3"><a href="index.php?action=singlepost&id=<?=$_GET['id'] ?>" class="text-decoration-none link-dark">Retour a l'article</a></button>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('./views/templateAdmin.php'); ?>