<?php 
session_start();
ob_start(); 
// Demarrage pour chaque fichier views
?> 
<div class="card mx-auto p-3 col-4">
<h5 class="title text-center">Se connecter</h5>
	<form method="POST" action="index.php?action=auth">
		<div class="mb-3 ">
			<label for="inputLogin" class="col-5 col-form-label">Username</label>
			<input type="text" class="form-control" name="username">
		</div>
		<div class="mb-3 ">
			<label for="inputPassword"class="col-5 col-form-label">Password</label>
			<input type="password" class="form-control" id="inputPassword" name="password">
		</div>
		<div class="row m-2">
			<input class="btn btn-outline-success mb-2" type="submit" name="verify" value="Se connecter">
			<a type="button" href="index.php" class="btn btn-primary" rôle="button">Retour</a>
		</div>
	</form>

</div>


<?php $content = ob_get_clean(); //ici je stocke tout le contenu entre le ob_start et le ob_get_clean dans la variable $content?>

<?php require('template.php'); //ici j'appelle le fichier template.php pour lui envoyer la variable $content?>