<?php 
session_start();
ob_start(); 
// Demarrage pour chaque fichier views
require("./functions/categories/getAllCategories.php");
?> 

<form method="POST" action="index.php?action=createPost">
  <div class="mb-3">
    <label for="title" class="form-label">Titre de l'article</label>
    <input type="text" name="title" class="form-control" id="title" placeholder="Your title">
  </div>
  <div class="mb-3 d-flex flex-column">
    <label for="content" class="form-label">Content</label>
    <textarea name="content" id="content" cols="100" rows="5" placeholder="content..."></textarea>
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
  <button type="submit" class="btn btn-primary my-3">Create</button>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('./views/templateAdmin.php'); ?>