<?php
session_start();
ob_start();
// Demarrage pour chaque fichier views
require("./functions/categories/getAllCategories.php");
require("./functions/tags/getAlltag.php");
?>
<h4 class="title text-center">Créer un article !!!</h4>
<form method="POST" action="index.php?target=post&action=create" class="my-5">
  <div class="row align-items-end">
    <div class=" col-4">
      <label for="title" class="form-label">Titre de l'article</label>
      <input type="text" name="title" class="form-control" id="title" placeholder="Your title" required>
    </div>
    <div class="col-4">
      <label for="createdDate" class="form-label">Date de publication</label>
      <input type="date" class="form-control" name="createdDate" id="createdDate" required>
    </div>
  </div>
  <div class="my-4 d-flex flex-column">
    <label for="content" class="form-label">Votre contenu </label>
    <textarea name="content" id="content" cols="100" rows="5" placeholder="Votre contenu ici...."></textarea>
  </div>
  <div class="row align-items-end">

    <div class="col-4">
      <select class="form-select " name="idTag" aria-label="Default select example" required>
        <option value="" selected>Selectionner le tag</option>
        <?php foreach ($tags as $tag) : ?>
          <option value="<?= $tag['id'] ?>"><?= $tag['tagName'] ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="col-4">
      <select class="form-select " name="idCategory" aria-label="Default select example" required>
        <option value="" selected>Selectionner la catégorie</option>
        <?php foreach ($results as $categorie) : ?>
          <option value="<?= $categorie['id'] ?>"><?= $categorie['catName'] ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="col">
      <button type="submit" class="btn btn-success">Create</button>
      <button type="button" class="btn btn-warning"><a href="index.php?target=admin&action=home"></a> Annuler</button>
    </div>
  </div>
</form>


<?php $content = ob_get_clean(); ?>

<?php require('./views/templateAdmin.php'); ?>