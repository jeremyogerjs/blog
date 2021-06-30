<?php 
session_start();
ob_start();

require('functions/comments/getAllComments.php');
require_once('./functions/posts/getAllpost.php');
?>

<p>Liste des commentaires a valider !!!!</p>
    
    <?php foreach($results as $result ): ?>
    
        <?php foreach ( getComments($result['id'],0) as $comm): ?>
        <h1><?= $result['title'] ?></h1>
        <span><?= $comm['comment']?></span>
        <a href="index.php?action=updateComm&id=<?=$comm['id']; ?>"><i class="fas fa-check"></i></i></a>
        <a href="index.php?action=delComm&id=<?=$comm['id']; ?>"><i class="fa fa-window-close my-3" aria-hidden="true"></i></a><br> 
        <?php endforeach; ?>                            
    <?php endforeach; ?>     
    
    
<?php $content = ob_get_clean(); ?>

<?php require('./views/templateAdmin.php'); ?>