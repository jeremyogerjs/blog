<?php ob_start(); 
// Demarrage pour chaque fichier views
require('./functions/getAllpost.php');
var_dump($results);
?> 

<div>

    <p>Je suis l'accueil !!!!</p>

</div>

<?php $content = ob_get_clean(); //ici je stocke tout le contenu entre le ob_start et le ob_get_clean dans la variable $content?>

<?php require('template.php'); //ici j'appelle le fichier template.php pour lui envoyer la variable $content?>