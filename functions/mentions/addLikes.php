<?php
$bdd = pdo_connect_mysql();
if(isset($_GET['t'],$_GET['id'])){
    $getid = (int) $_GET['id'];
    $gett = (bool) $_GET['t'];
    $req = $bdd->prepare('SELECT id FROM Posts WHERE id = ?');
    $req->execute(array($getid));
    if($req->rowCount() == 1) {
        if ($gett=1){
            $checkLike=$bdd->prepare('SELECT id FROM mentions WHERE idPosts = ? ');
            $checkLike->execute(array($getid));
            
         if ($gett=1){
            $insLike=$bdd->prepare('INSERT INTO mentions(idPosts,likes)VALUES(?, 1)');
            $insLike->execute(array($getid)) ;
            header('location: index.php');
            }
        }
    }
}

function getLikes($id){
    $bdd = pdo_connect_mysql();
    $req = $bdd->prepare('SELECT id,idPosts,likes FROM mentions WHERE idPosts = ? ');

    $req->execute([$id]);
    $result=$req->fetchAll();
    return $result;
} 