<?php 

if(isset($_GET['action']))
{
    if($_GET['action'] === 'admin')
    {
        if(!empty($_POST)) {
            require  ('./views/admin/adminHome.php');
        }
        else {
            require('./views/signInAdmin.php');
        }
    }
    else if($_GET['action'] === 'logout')
    {
        require('./functions/admin/logout.php');
    }

    else if ($_GET['action'] === 'memberarea')
    {
        require  ('./views/admin/adminHome.php');
    }
    else if($_GET['action'] === 'auth')
    {
        if(!empty($_POST)) {
            require  ('./functions/admin/admin.php');
        }
        else {
            require('./views/signInAdmin.php');
        }
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
    elseif($_GET['action'] === 'adminComments')
    {
        require('./views/admin/adminCategories.php'); // a changer
    }
    elseif($_GET['action'] === 'createPost')
    {
        if(!empty($_POST))
        {
            require('./functions/posts/createPost.php');
        }
        else
        {
            require('./views/forms/createArticles.php');
        }
    }
}
else
{
    //tout les postes !!!!
    require('./views/accueil.php');
}