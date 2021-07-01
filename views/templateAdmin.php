<?php require('./functions/categories/getAllCategories.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Blog</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-info">
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
          <?php if (empty($_SESSION)) : ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php?target=admin&action=auth">Se connecter</a>
            </li>
          <?php else : ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php?target=admin&action=logout">Se deconnecter</a>
            </li>
          <?php endif; ?>
          <?php if (!empty($_SESSION)) : ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php?target=admin&action=home">Espace admin</a>
            </li>
          <?php endif; ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categories
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php foreach ($results as $categorie) : ?>
                <li><a class="dropdown-item" href="index.php?target=categories&action=all&id=<?= $categorie['id'] ?>"><?= $categorie['catName'] ?></a></li>
              <?php endforeach; ?>
            </ul>
          </li>
        </ul>
        <form class="d-flex" method="POST" action="index.php?target=post&action=search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <?php if (!empty($_SESSION)) : ?>
      <div class="col-3 ms-3 clearfix">
        <ul class="nav  flex-column position-fixed my-5">
          <li class="nav-item mb-3 bg-success rounded-1">
            <a class="nav-link text-light text-decoration-none" href="index.php?target=admin&action=unCheckCommentaries"><i class="fas fa-check fa-3 me-2"></i>Commentaires a valider</a>
          </li>
          <li class="nav-item mt-2 bg-success rounded-1">
            <a class="nav-link text-light text-decoration-none" href="index.php?target=post&action=create"><i class="fas fa-pen-fancy fa-3 me-2"></i>Creer articles</a>
          </li>
        </ul>
      </div>
      <div class="col-8 my-3 mx-auto mb-5 pb-5">
        <?= $content ?>
      </div>
    
  <?php else : echo 'AUTHENTIFIE TOI CONNARD !!'; ?>

  <?php endif; ?>
  <footer class="position-absolute w-100">
    <div class="navbar navbar-expand-lg navbar-light bg-info">
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