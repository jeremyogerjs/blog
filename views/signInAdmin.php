<?php 
session_start();
ob_start(); 
// Demarrage pour chaque fichier views
?> 

<form method="POST" action="index.php?action=auth">
    <div class="mb-3 row">
		<label for="inputLogin" class="col-5 col-form-label">Username</label>
		<div class="col-6">
		<input type="text" class="form-control" name="username">
		</div>
	</div>

    <br>

    <div class="mb-3 row">
        <label for="inputPassword"class="col-5 col-form-label">Password</label>
        <div class="col-6">
        <input type="password" class="form-control" id="inputPassword" name="password">
        </div>
    </div>

    <br>

    <div class="mb-6">
		<div class="btnConn col-6">
		<input class="btn btn-outline-primary" type="submit" name="verify">
		<a type="button" href="index.php" class="btn btn-primary" rôle="button">Retour</a>
		<a type="button" href="http://localhost/phpmyadmin/index.php?route=/sql&server=1&db=biblio&table=admin&pos=0" class="btn btn-warning" rôle="button">Accéder à la table admin</a>
		</div>
	</div>
</form>

<?php var_dump($_SESSION) ?>
<?php $content = ob_get_clean(); //ici je stocke tout le contenu entre le ob_start et le ob_get_clean dans la variable $content?>

<?php require('template.php'); //ici j'appelle le fichier template.php pour lui envoyer la variable $content?>