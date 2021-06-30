<?php 
session_start ();
ob_start(); 
require('./functions/posts/getAllpost.php');
require('functions/comments/getAllComments.php');
require('functions/posts/getSinglePost.php');
require_once('index.php')
?>

<!-- displays  posts with likes & control admin --------------------------------------------------- -->
<div class="container d-flex flex-column my-4">
    <?php if(!empty($_SESSION)) : ?>
        <div class="col-md-8 mx-auto ">
            <h1><?= $result['title'] ?><a href="index.php?action=updatePost&id=<?=$_GET['id']; ?>" class="ms-4"><i class="fas fa-pencil-alt"></i></a> </h1>
            <time class="text-muted">Date de parution : <?= $result['createdDate'] ?></time>
            <p class="text-break my-3"><?= $result['content']?></p>
            
        </div>
                
    <?php else : ?>
        <!-- display for guest--------------------------------------------------------------------------------------------- -->
        <div class="col-md-8 mx-auto ">
            <h1><?= $result['title'] ?></h1>
            <time class="text-muted">Date de parution : <?= $result['createdDate'] ?></time>
            <p class="text-break my-3"><?= $result['content']?></p>
            
            <p class="float-end text-primary "><a href="index.php?action=likes&t=1&id=<?=$result['id']?>" class="text-decoration-none" ><i class="fas fa-thumbs-up fa-lg"></i> J'aime</a></p>
        </div>
    <?php endif; ?>

<!-- manage error ---------------------------------------------------------------------- -->

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
        <div class="alert alert-info col-7 mx-auto text-center" role="alert">
            <?= $sucess ?>
            <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
       
            <?php elseif(isset($error)) : ?>
            <div class="alert alert-danger col-7 mx-auto text-center" role="alert">
                <?= $error ?>
                <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    <?php endif; ?>

<!-- forms comments-------------------------------------------------------------------------------------------------------->
    <hr class="col-7 mx-auto bg-danger my-4">
    <div class="col-7 mx-auto">
        <form action="index.php?action=createComm&id=<?=$result['id']?>" method="post">
        <div class="mb-3 col-4">
                <label for="pseudo">Pseudo</label>
                <input class="form-control" type="text" name="pseudo" id="pseudo" required>
            </div>
            <div class="mb-3">
                <label for="comment">Commentaires</label>
                <textarea class="form-control" name="comment" id="comment" required cols="100" rows="5"></textarea>
            </div>
            <input class="btn btn-success" type="submit" value="envoyé">
        </form>
    </div>

    <hr class="col-7 mx-auto bg-danger my-4">
</div>
    
    <!-- display comments ---------------------------------------------------------------------------------------------------------- -->
<div class="mx-auto col-7">
    <h3>Commentaires</h3>
    <?php $result = getComments($result['id'],1);
            foreach ($result as $result): ?>
    <div class="card  my-3">
        <div class="card-header">
            <h6 class="card-subtitle mb-2 fw-bold">Pseudo : <?= $result['pseudo']?></h6>
        </div>
        <div class="card-body">
            <p class="card-text"><?= $result['comment']?></p>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php $content = ob_get_clean(); //ici je stocke tout le contenu entre le ob_start et le ob_get_clean dans la variable $content?>

<?php require('template.php'); //ici j'appelle le fichier template.php pour lui envoyer la variable $content?>