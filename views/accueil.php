<?php 
session_start ();
ob_start(); // Demarrage pour chaque fichier views
require('./helper/db-connect.php'); // Déclarer la connection a la bse au debut du fichier view
require('./functions/posts/getAllpost.php');
require('./functions/tags/getTag.php');
require('./functions/comments/getAllComments.php');

?> 
<div>
<?php if(isset($_SESSION)) : ?>
    <p>Bienvenue <?php echo $_SESSION['username'] ?> Je suis l'accueil !!!!</p>
    <?PHP else : ?>
<?php endif; ?>
    <?php foreach($results as $result) : ?>
    <?php 
        echo "<pre>";
        
        echo "</pre>";    
    ?>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><a href="index.php?action=singlepost&id=<?=$result['id']?>" class="text-dark text-decoration-none" ><?= $result['title'] ; ?></a></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $result['username'] ?></h6>
                <p class="card-text"><?= substr($result['content'],0,65) ?></p>
                <?php foreach(getTag($result['id']) as $tag ) : ?>
                    <span class="badge bg-info text-dark"><?= $tag['tagName'] ; ?></span>
                <?php endforeach; ?>
                <span class="badge bg-warning text-dark"> <a href="index.php?action=categorie" class="text-dark text-decoration-none"><?= $result['catName'] ; ?></a></span>
                <span class="badge bg-secondary text-white"><?= count(getComments($result['id'],1));?> commentaire<?= count(getComments($result['id'],1)) > 0 ? 's' : ''?></span>
            </div>
        </div>
    <?php endforeach;?>

</div>

<?php $content = ob_get_clean(); //ici je stocke tout le contenu entre le ob_start et le ob_get_clean dans la variable $content?>

<?php require('./views/template.php'); //ici j'appelle le fichier template.php pour lui envoyer la variable $content?>