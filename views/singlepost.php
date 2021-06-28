<?php 
 session_start ();

ob_start(); 
?>


<div>
    <h1><?= $result['title'] ?></h1>
    <p><?= $result['content']?></p>
    <time><?= $result['createDate'] ?></time>
</div>

    <hr>
    <form action="createComm.php?id=<?= $post->id ?>" method="post">
       
       <div class="mb-3">
            <label for="pseudo">Pseudo</label>
            <input class="form-control" type="text" name="pseudo" id="pseudo"><br><br>
        </div>
        <div class="mb-3">
            <label for="comment">Commentaires</label>
            <textarea class="form-control" name="comment" id="comment" cols="20" rows="8"></textarea><br><br>
        </div>
        <input type="submit" value="envoyé">
    </form>
    <hr>


<?php $content = ob_get_clean(); //ici je stocke tout le contenu entre le ob_start et le ob_get_clean dans la variable $content?>

<?php require('template.php'); //ici j'appelle le fichier template.php pour lui envoyer la variable $content?>