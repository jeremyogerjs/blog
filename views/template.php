<?php require('./functions/categories/getAllCategories.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Blog</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light <?= !empty($_SESSION) ? 'bg-info' : 'bg-danger' ?> ">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Blog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <?php if(empty($_SESSION)) : ?>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=admin">Se connecter</a>
          </li>
          <?php else : ?>
            <li class="nav-item">
            <a class="nav-link" href="index.php?action=logout">Se deconnecter</a>
          </li>
        <?php endif; ?>
        <?php if(!empty($_SESSION)) : ?>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=espaceAdmin">Espace admin</a>
          </li>
        <?php endif; ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php foreach($results as $categorie) : ?>
              <li><a class="dropdown-item" href="index.php?action=archivePost&id=<?= $categorie['id'] ?>"><?= $categorie['catName'] ?></a></li>
            <?php endforeach; ?>
          </ul>
        </li>
      </ul>
      <form class="d-flex" method="POST" action="index.php?action=searchPost">
        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
  <div class="container mx-auto">
    <?= $content ?>
  </div>
  <div class="d-flex justify-content-center my-4">

  <?php if(isset($_GET['action']) && $_GET['action'] == 'archivePost' ) : ?>

    <ul class="pagination">
      <?php if ($currentPage > 1): ?>
        <li class="page-item">
          <a href="index.php?action=archivePost&id=<?=$_GET['id']?>&page=<?=$currentPage - 1 ?>" class="page-link"><< Page précédente  </a>
        </li>
      <?php endif ?>
      <?php if ($currentPage < $pages): ?>
      <li class="page-item">
        <a href="index.php?action=archivePost&id=<?=$_GET['id']?>&page=<?=$currentPage + 1 ?>" class="page-link">Page suivante >> </a>
      </li>
      <?php endif; ?>
    </ul>

    <?php elseif(isset($_GET['action']) && $_GET['action'] == 'searchPost' ) : ?>

      <ul class="pagination">
        <?php if ($currentPage > 1): ?>
        <li class="page-item">
          <a href="index.php?action=searchPostpage=<?=$currentPage - 1 ?>" class="page-link"><< Page précédente  </a>
        </li>
        <?php endif ?>
        <?php if ($currentPage < $pages): ?>
        <li class="page-item">
          <a href="index.php?action=searchPost&page=<?=$currentPage + 1 ?>" class="page-link">Page suivante >> </a>
        </li>
        <?php endif; ?>
      </ul>

    <?php elseif( isset($_GET['action']) && $_GET['action'] == 'admin' || $_GET['action'] == 'singlepost' || $_GET['action'] == 'memberarea' || $_GET['action'] == 'adminComments' ) : ?>
    <?php else : ?>

    <ul class="pagination">
      <?php if ($currentPage > 1): ?>
      <li class="page-item">
        <a href="index.php?page=<?=$currentPage - 1 ?>" class="page-link"><< Page précédente  </a>
      </li>
      <?php endif ?>

      <?php if ($currentPage < $pages): ?>
      <li class="page-item">
          <a href="index.php?page=<?=$currentPage + 1 ?>" class="page-link ms-2">Page suivante >> </a>
      </li>
      <?php endif; ?>
    </ul>
  <?php endif; ?>

  </div>
  <footer>
    <div class="navbar navbar-expand-lg navbar-light <?= !empty($_SESSION) ? 'bg-info' : 'bg-danger' ?>">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Sitemap</a>
          </li>
        </ul>
        <form class="me-5">
          <i class="fab fa-facebook-square ms-4 fa-lg"></i>
          <i class="fab fa-twitter fa-lg ms-4"></i>
        </form>
      </div>
    </div>
  </footer>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>