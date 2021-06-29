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
    else if ($_GET['action'] === 'createComm')
    {
        if(!empty($_POST))
        {
            require ('./functions/comments/createComm.php');
        }
        else
        {
            require ('./views/singlepost.php');

        }
    }
    else if ($_GET['action'] === 'getAllpost')
    {
        require('./functions/posts/getAllpost.php');
    }
    elseif($_GET['action'] === 'searchPost')
    {
        require ('./views/search.php');
    }
    elseif($_GET['action'] === 'archivePost')
    {
        require ('./views/archive.php');
    }
    elseif($_GET['action'] === "espaceAdmin")
    {
        require('./views/admin/adminHome.php');
    }
    elseif($_GET['action'] === 'adminComments')
    {
        require('./views/admin/adminComments.php'); // a changer
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
    elseif($_GET['action'] === 'updatePost')
    {
       require('./forms/updateArticle.php');
    }
    elseif($_GET['action'] === 'likes')
    {
       require('./functions/mentions/addLikes.php');
    }
}
else
{
    //tout les postes !!!!
    require('./views/accueil.php');
}