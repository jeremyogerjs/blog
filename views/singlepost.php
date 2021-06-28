<?php 
 session_start ();

ob_start(); 
?>



<h1><?= $post->title ?></h1>
<p><?= $post->content ?></p>
<time><?= $post->createDate ?></time>

<form action="createComm.php?id=<?= $post->id ?>" method="post">
<label for="pseudo">Pseudo</label>
<input type="text" name="pseudo" id="pseudo"><br><br>
<label for="comment">Commentaires</label>
<textarea name="comment" id="comment" cols="30" rows="10"></textarea>
</form>
<?php $content = ob_get_clean(); //ici je stocke tout le contenu entre le ob_start et le ob_get_clean dans la variable $content?>

<?php require('template.php'); //ici j'appelle le fichier template.php pour lui envoyer la variable $content?>