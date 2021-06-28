<?php 

 session_start ();

ob_start(); 
 include('./helper/db-connect.php');
 require('./functions/posts/getAllpost.php');
?>

<?php foreach($results as $result) : ?>
    <div class="container">
        <div class="col-sm">
            <h1><?= $result['title'] ?></h1>
            <p><?= $result['content']?></p>
            <time><?= $result['createdDate'] ?></time>
        </div>
        
    </div>
<?php endforeach;?>

    <hr>
    <form action="createComm.php?id=<?= $result['id'] ?>" method="post">
       
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