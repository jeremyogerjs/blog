<?php ob_start(); 
session_start();
require('./functions/posts/getAllpostByCategory.php');
require('./functions/tags/getTag.php');
require('./functions/comments/getAllComments.php');
?>
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


<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>