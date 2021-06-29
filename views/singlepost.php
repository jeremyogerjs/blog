<?php 
session_start ();
ob_start(); 
include('./helper/db-connect.php');
require('./functions/posts/getAllpost.php');
require('functions/comments/getAllComments.php');
$id=$_GET['id'];
$bdd = pdo_connect_mysql();
$req = $bdd->prepare("SELECT title,content,createdDate,id FROM posts where id =?");
$req->execute(array($id)

);
$result = $req->fetch();


?>



<!-- affichage du postes  -->
  

   <div class="card-body">
        <div class='col-10'>
            <h1><?= $result['title'] ?></h1>
            <div class="card-text"><?= $result['content']?></div>
            <time><?= $result['createdDate'] ?></time>
        </div>
         
    </div>
   


<!-- gestion des erreur  -->
<?php
    if(!empty($_post)){
        echo "<div class='alert alert-danger'>vous devez remplir tous les champs</div>";
    }
?>

    <hr>
    <form action="createComm.php&id=<?= $result['id'] ?>" method="post">
       
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

    <!-- affichage des commentaires  -->
    <?php
    $result = getComments($result['id'],1);
     foreach ($result as $result): ?>
   
    <span ><?= $result['comment']?></span>
    <?php endforeach; ?>
<?php $content = ob_get_clean(); //ici je stocke tout le contenu entre le ob_start et le ob_get_clean dans la variable $content?>

<?php require('template.php'); //ici j'appelle le fichier template.php pour lui envoyer la variable $content?>