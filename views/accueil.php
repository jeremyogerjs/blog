<?php 
 session_start ();

ob_start(); 
// Demarrage pour chaque fichier views
require('./functions/getAllpost.php');
echo "<pre>";
var_dump($results);
echo "</pre>";

echo "<pre>";
var_dump(getTag(1));
echo "</pre>";
?> 
<div>
<?php if(isset($_SESSION)) : ?>
    <p>Bienvenue <?php echo $_SESSION['username'] ?> Je suis l'accueil !!!!</p>
    <?PHP else : ?>
<?php endif; ?>
    <?php foreach($results as $result) : ?>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?= $result['title'] ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $result['username'] ?></h6>
                <p class="card-text"><?= substr($result['content'],0,65) ?></p>
            </div>
        </div>
    <?php endforeach;?>

</div>

<?php $content = ob_get_clean(); //ici je stocke tout le contenu entre le ob_start et le ob_get_clean dans la variable $content?>

<?php require('./views/template.php'); //ici j'appelle le fichier template.php pour lui envoyer la variable $content?>