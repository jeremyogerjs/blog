<?php
session_start();
ob_start(); // Demarrage pour chaque fichier views
require('./functions/posts/getAllpost.php');
require('./functions/tags/getTag.php');
require('./functions/comments/getAllComments.php');
require('./functions/mentions/addLikes.php');

?>
<?php if ($reponse = 0) : ?>
    <p class="test-danger">AUCUN RESULTAT !!!</p>
<?php endif; ?>
<div class="mx-auto">
    <div class="row align-items-center">
        <?php foreach ($results as $result) : ?>
            <div class="card col-5 m-3">
                <div class="card-body">
                    <?php if (!empty($_SESSION)) : ?>
                        <a href="index.php?target=post&action=delete&id=<?= $result['id'] ?>" class="float-end text-danger"><i class="fas fa-times fa-2x"></i></a>
                    <?php endif; ?>
                    <a href="index.php?target=post&action=single&id=<?= $result['id'] ?>" class="text-dark text-decoration-none">
                        <h5 class="card-title"><?= $result['title']; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $result['username'] ?></h6>
                        <p class="card-text"><?= substr($result['content'], 0, 65) ?></p>
                    </a>
                    <?php foreach (getTag($result['id']) as $tag) : ?>
                        <span class="badge bg-info text-dark"><?= $tag['tagName']; ?></span>
                    <?php endforeach; ?>
                    <span class="badge bg-warning text-dark my-3"> <a href="index.php?target=categories&action=all&id=<?= $result['idCategory'] ?>" class="text-dark text-decoration-none"><?= $result['catName']; ?></a></span>
                    <span class="badge bg-secondary text-white"><?= count(getComments($result['id'], 1)); ?> commentaire<?= count(getComments($result['id'], 1)) > 1 ? 's' : '' ?></span>
                    <span class="badge bg-primary"><i class="fas fa-thumbs-up fa-lg"></i> J'aime (<?= count(getLikes($result['id'])); ?>)</span>
                    <p class="text-danger">Publié le <?= $result['createdDate'] ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php $content = ob_get_clean(); //ici je stocke tout le contenu entre le ob_start et le ob_get_clean dans la variable $content
?>

<?php require('./views/template.php'); //ici j'appelle le fichier template.php pour lui envoyer la variable $content
?>