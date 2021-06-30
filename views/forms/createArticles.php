<?php 
session_start();
ob_start(); 
// Demarrage pour chaque fichier views
require("./functions/categories/getAllCategories.php");
?> 
<h4 class="title text-center">Creer un article !!!</h4>
  <form method="POST" action="index.php?action=createPost" class="my-5">
    <div class="mb-3 col-4">
      <label for="title" class="form-label">Titre de l'article</label>
      <input type="text" name="title" class="form-control" id="title" placeholder="Your title">
    </div>
    <div class="mb-3 d-flex flex-column">
      <label for="content" class="form-label">Content</label>
      <textarea name="content" id="content" cols="100" rows="5" placeholder="content..."></textarea>
    </div>
    <div class="row align-items-end">
      <div class="col-4">
        <label for="createdDate" class="form-label">Date de création</label>
        <input type="date" class="form-control" name="createdDate" id="createdDate">
      </div>
      <div class="col-4">
        <select class="form-select " name="idCategory" aria-label="Default select example">
          <option selected>Selectionner la catégorie</option>
          <?php foreach($results as $categorie) : ?>
              <option value="<?= $categorie['id'] ?>"><?= $categorie['catName'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <dv class="col">
        <button type="submit" class="btn btn-success">Create</button>
      </dv>
    </div>
  </form>


<?php $content = ob_get_clean(); ?>

<?php require('./views/templateAdmin.php'); ?>