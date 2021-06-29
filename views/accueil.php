<?php 
session_start ();
ob_start(); // Demarrage pour chaque fichier views
require('./functions/posts/getAllpost.php');
require('./functions/tags/getTag.php');
require('./functions/comments/getAllComments.php');
?> 

<div>
    <?php if(!empty($_SESSION)) : ?>
        <p>Bienvenue a l'accueil <?php echo $_SESSION['username'] ?> </p>
        <?php else : ?>
        <p>Bienvenue a l'accueil invité !!!!</p>
    <?php endif; ?>
    <?php foreach($results as $result) : ?>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <a href="index.php?action=singlepost&id=<?=$result['id']?>" class="text-dark text-decoration-none" >
                    <h5 class="card-title"><?= $result['title'] ; ?>
                        <?php if(!empty($_SESSION)) : ?>
                            <i class="fa fa-window-close my-3" aria-hidden="true"></i>
                        <?php endif; ?>
                    </h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $result['username'] ?></h6>
                    <p class="text-danger">Publié le <?= $result['createdDate'] ?></p>
                    <p class="card-text"><?= substr($result['content'],0,65) ?></p>
                </a>
                <?php foreach(getTag($result['id']) as $tag ) : ?>
                    <span class="badge bg-info text-dark"><?= $tag['tagName'] ; ?></span>
                <?php endforeach; ?>
                <span class="badge bg-warning text-dark"> <a href="index.php?action=archivePost&id=<?= $result['idCategory'] ?>" class="text-dark text-decoration-none"><?= $result['catName'] ; ?></a></span>
                <span class="badge bg-secondary text-white"><?= count(getComments($result['id'],1));?> commentaire<?= count(getComments($result['id'],1)) > 1 ? 's' : ''?></span>
            </div>
        </div>
    <?php endforeach;?>
</div>

<?php $content = ob_get_clean(); //ici je stocke tout le contenu entre le ob_start et le ob_get_clean dans la variable $content?>

<?php require('./views/template.php'); //ici j'appelle le fichier template.php pour lui envoyer la variable $content?>