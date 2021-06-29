<?php 
session_start ();
ob_start(); 
require_once('./helper/db-connect.php');
require('./functions/posts/getAllpost.php');
require('functions/comments/getAllComments.php');
require('functions/posts/getSinglePost.php');
?>

<!-- affichage du postes et controle admin -->
    <?php if(!empty($_SESSION)) : ?>
    <a href="index.php?action=updateArticle"><i class="fas fa-pencil-alt"></i></a> 
    <div class="container">
            <div class='row d-block'>
                <div class="col-md-4 mx-auto text-center">
                    <h1><?= $result['title'] ?></h1>
                    <?= $result['content']?>
                    
                </div>
                <time><?= $result['createdDate'] ?></time>
            </div>
        </div>

    <?php else : ?>
    
        <div class="container">
            <div class='row d-block'>
                <div class="col-md-4 mx-auto text-center">
                    <h1><?= $result['title'] ?></h1>
                    <?= $result['content']?>
                    
                </div>
                <time><?= $result['createdDate'] ?></time>
            </div>
        </div>
    <?php endif; ?>
<!-- gestion des erreur  -->

    <?php
        if(!empty($_POST))
        {
            if(empty($_POST['pseudo'])){
                echo "<div class='alert alert-danger'>vous devez remplir le champs pseudo </div>";
            }
            elseif(empty($_POST['comment'])){
                echo "<div class='alert alert-danger'>vous devez remplir le champs commentaire </div>";
            }
        }
        
    ?>
    <?php if(isset($sucess)) : ?>
        <p><?= $sucess ?></p>
            <?php elseif(isset($error)) : ?>
        <p><?= $error ?></p>
    <?php endif; ?>


    <hr>
    <form action="index.php?action=createComm&id=<?=$result['id']?>" method="post">
       <div class="mb-3">
            <label for="pseudo">Pseudo</label>
            <input class="form-control" type="text" name="pseudo" id="pseudo" required><br><br>
        </div>
        <div class="mb-3">
            <label for="comment">Commentaires</label>
            <textarea class="form-control" name="comment" id="comment" required cols="20" rows="8"></textarea><br><br>
        </div>
        <input type="submit" value="envoyé">
    </form>

    <hr>
    
    <h3>Commentaires:</h3>
    <!-- affichage des commentaires  -->
    <?php ;
    $result = getComments($result['id'],1);
     foreach ($result as $result): ?>
    <span><?= $result['comment']?></span>
    <?php endforeach; ?>
<?php $content = ob_get_clean(); //ici je stocke tout le contenu entre le ob_start et le ob_get_clean dans la variable $content?>

<?php require('template.php'); //ici j'appelle le fichier template.php pour lui envoyer la variable $content?>