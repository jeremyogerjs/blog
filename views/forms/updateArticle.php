<?php 
session_start();
ob_start(); 
// Demarrage pour chaque fichier views
require("./functions/categories/getAllCategories.php");
?> 

<form method="POST" action="index.php?action=createPost&id= <?= $_GET['id'] ?>">
  <div class="mb-3">
    <label for="title" class="form-label">Titre de l'article</label>
    <input type="text" class="form-control" id="title">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="content" class="form-label">Content</label>
    <textarea name="content" id="content" cols="30" rows="10"></textarea>
  </div>
  <div class="mb-3">
    <label for="createdDate" class="form-label">Date de création</label>
    <input type="date" class="form-control" name="createdDate" id="createdDate">
  </div>
  <select class="form-select" name="idCategory" aria-label="Default select example">
    <option selected>Selectionner la catégorie</option>
    <?php foreach($results as $categorie) : ?>
        <option value="<?= $categorie['id'] ?>"><?= $categorie['catName'] ?></option>
    <?php endforeach; ?>
</select>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('./views/templateAdmin.php'); ?>