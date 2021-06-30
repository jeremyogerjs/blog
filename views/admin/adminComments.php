<?php 
session_start();
ob_start();

require('functions/comments/getAllComments.php');
?>

<h4 class="title text-center">Liste des commentaires a valider !!!!</h4>
<div class="row">
    <?php foreach ( getAllComments(0) as $comm): ?>
        <div class="card col-5 m-3">
            <div class="card-header">
                <h5 class="card-title"><?= $comm['title'] ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $comm['pseudo'] ?></h6>
            </div>
            <div class="card-body">

                <p class="card-text"><?= $comm['comment']?></p>
                <a href="index.php?action=updateComm&id=<?=$comm['id']; ?>" class="text-success"><i class="fas fa-check fa-2x"></i></i></a>
                <a href="index.php?action=delComm&id=<?=$comm['id']; ?>" class="text-danger float-end"><i class="fas fa-times fa-2x"></i></a><br>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('./views/templateAdmin.php'); ?>