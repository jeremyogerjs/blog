<?php
require('./helper/db-connect.php');

$bdd = pdo_connect_mysql()
if(isset($_GET['t'],$_GET['id']){

    $getid = (int) $_GET['id'];
    $gett = (int) $_GET['t'];
    $req = $bdd->prepare('SELECT id FROM Posts WHERE id = ?');
    $req->execute(array($getid));
    if($req->rowCount() == 1) {
        if ($gett=1){
            $checkLike = $bdd->prepare('SELECT id FROM mentions WHERE idPosts = ? ');
            $checkLike->execute(array($getid)
        }else{
            $insLike=  $bdd->prepare()
        }

    }
}