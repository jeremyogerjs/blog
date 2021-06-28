<?php 
    session_start(); // start session
    require_once 'db-connect.php'; // connexion à la base de données

    function auth(){
    $bdd =  pdo_connect_mysql() ;
    if(!empty($_POST['username']) && !empty($_POST['password'])) // check des champs username, password et qu'il sont pas vident
    {
        // Patch XSS
        $username = htmlspecialchars($_POST['username']); 
        $password = htmlspecialchars($_POST['password']);
      
        
        // check si luser  est inscrit dans la table user
        $check = $bdd->prepare('SELECT username, password FROM user WHERE username = admin');
        $check->execute(array($username));
        $data = $check->fetch();
        $row = $check->rowCount();
        
        

        // Si > à 0 alors l'utilisateur existe
        if($row > 0)
        {
            // Si le mail est bon format
            if(filter_var($username))
            {
                // Si le mot de passe est  bon
                if(password_verify($password, $data['password']))
                {
                    // On créer la session et on redirige sur landing.php(dashbord!)
                    $_SESSION['user'];
                    header('Location: landing.php');
                    die();
                }else{ header('Location: index.php?login_err=password'); die(); }
            }else{ header('Location: index.php?login_err=username'); die(); }
        }else{ header('Location: index.php?login_err=already'); die(); }
    }else{ header('Location: index.php'); die();} // si le formulaire est envoyé sans aucune données}
} 