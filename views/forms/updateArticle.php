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
<h4 class="title text-center">Modifier un article !!!!</h4>
<form method="POST" action="index.php?action=updatePost&id=<?= $_GET['id']; ?>" class="my-5">
  <div class="mb-3 col-4">
    <label for="title" class="form-label">Titre de l'article</label>
    <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelp">
    <div id="titleHelp" class="form-text">Titre actuel : <?= $result['title'] ?></div>
  </div>
  <div class="mb-3 d-flex flex-column">
    <label for="content" class="form-label">Content</label>
    <textarea name="content" id="content" cols="100" rows="5"><?= $result['content'] ?></textarea>
  </div>
  <div class="row align-items-end">
    <div class="col-4">
      <label for="createdDate" class="form-label">Date de création</label>
      <input type="date" class="form-control" name="createdDate" id="createdDate" aria-describedby="createdDateHelp">
      <div id="createdDateHelp" class="form-text">Date création actuel : <?= $result['createdDate'] ?></div>
    </div>
    <div class="col-4">
      <select class="form-select" name="idCategory" aria-label="Default select example" aria-describedby="categorieHelp">
        <option selected>Selectionner la catégorie</option>
        <?php foreach($results as $categorie) : ?>
            <option value="<?= $categorie['id'] ?>"><?= $categorie['catName'] ?></option>
        <?php endforeach; ?>
      </select>
      <div id="categorieHelp" class="form-text">Catégorie actuel : <?= $result['catName'] ?></div>
    </div>
    <div class="col-4 mb-4">
    <button type="submit" class="btn btn-primary">Edit</button>
    <button type="submit" class="btn btn-warning"><a href="index.php?action=singlepost&id=<?=$_GET['id'] ?>" class="text-decoration-none link-dark">Retour a l'article</a></button>
    </div>
  </div>
    
</form>

<?php $content = ob_get_clean(); ?>

<?php require('./views/templateAdmin.php'); ?>