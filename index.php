<?php 

if(isset($_GET['action']))
{
    if($_GET['action'] === 'admin')
    {
        require('./views/signInAdmin.php');
    }
    elseif($_GET['action'] === 'auth')
    {
        require('./functions/admin.php');
    }
    else if($_GET['action'] === 'categorie')
    {
        require('./views/archive.php');
    }
    else if ($_GET['action'] === 'singlepost')
    {
        require ('./views/singlepost.php');
    }
    else if ($_GET['action'] === 'createCom')
    {
        require ('./functions/createComm.php');
    }
    else if ($_GET['action'] === 'getAllpost')
    {
        require('./functions/posts/getAllpost.php');
    }
    elseif($_GET['action'] === "espaceAdmin")
    {
        require('./views/admin/adminHome.php');
    }
    elseif($_GET['action'] === 'adminTag')
    {
        require('./views/admin/adminTag.php');
    }
    elseif($_GET['action'] === 'adminCategories')
    {
        require('./views/admin/adminCategories.php');
    }
    elseif($_GET['action'] === 'adminComments')
    {
        require('./views/admin/adminCategories.php');
    }
}
else
{
    //tout les postes !!!!
    require('./views/accueil.php');
}