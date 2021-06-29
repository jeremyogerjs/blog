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
       if(!empty($_POST)){
           require ('./functions/comments/createComm.php');
        } 
        else {
            require ('./views/singlepost.php');
        }
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
    elseif($_GET['action'] === 'delTag')
    {
        require('./functions/tags/deleteTag.php'); //error de foreign key si le tag est utiliser sa marche pas
    }
    elseif($_GET['action'] === 'editTag')
    {
        // appeler le fichier views editTag qui renvoie au formulaire
    }
    elseif($_GET['action'] === 'delCat')
    {
        require('./functions/categories/delCategories.php'); //error de foreign key si la catégorie est utiliser sa marche pas
    }
    elseif($_GET['action'] === 'editCat')
    {
        // appeler le fichier views editCategories qui renvoie au formulaire
    }  
    elseif($_GET['action'] === 'createCat')
    {
        // appeler le fichier views createCategories qui renvoie au formulaire
    } 
    elseif($_GET['action'] === 'createTag')
    {
        // appeler le fichier views createTag qui renvoie au formulaire
    } 
    elseif($_GET['action'] === 'updateArticle')
    {
       require('./forms/updateArticle.php');
    }
}
else
{
    //tout les postes !!!!
    require('./views/accueil.php');
}