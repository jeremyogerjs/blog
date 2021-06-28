<?php 

if(isset($_GET['action']))
{
    if($_GET['action'] === 'single')
    {
        // principe
    }
    elseif($_GET['action'] === 'admin')
    {
        require('./views/signInAdmin.php');
    }
    elseif($_GET['action'] === 'auth')
    {
        require('./functions/admin.php');
    }
}
else
{
    //tout les postes !!!!
    require('./views/accueil.php');
}