<?php
require_once('./helper/db-connect.php');

if (isset($_GET['target'])) {
    if ($_GET['target'] === 'post') {
        switch ($_GET['action']) {
            case 'all':
                require('./functions/posts/getAllpost.php');
                break;
            case 'single':
                require('./views/singlepost.php');
                break;
            case 'delete':
                require('./functions/posts/deletePost.php');
                break;
            case 'search':
                require('./views/search.php');
                break;
            case 'create':
                if (!empty($_POST)) {
                    require('./functions/posts/createPost.php');
                } else {
                    require('./views/forms/createArticles.php');
                }
                break;
            case 'update':
                if (!empty($_POST)) {
                    require('./functions/posts/updatePost.php'); 
                } else {
                    require('./views/forms/updateArticle.php'); 
                }
                break;
            default:
                break;
        }
    } else if ($_GET['target'] === 'admin') {
        switch ($_GET['action']) {
            case 'home':
                require('./views/admin/adminHome.php');
                break;
            case 'auth':
                if (!empty($_POST)) {
                    require('./functions/admin/admin.php');
                } else {
                    require('./views/signInAdmin.php');
                }
                break;
            case 'logout':
                require('./functions/admin/logout.php');
                break;
            case 'unCheckCommentaries':
                require('./views/admin/adminComments.php');
                break;
            default:
                break;
        }
    } else if ($_GET['target'] === "categories") {
        switch ($_GET['action']) {
            case 'all':
                require('./views/archive.php');
                break;

            default:
                break;
        }
    } else if ($_GET['target'] === 'commentaries') {
        switch ($_GET['action']) {
            case 'create':
                if (!empty($_POST)) {
                    require('./functions/comments/createComm.php');
                } else {
                    require('./views/singlepost.php');
                }
                break;
            case 'update':
                require('./functions/comments/updateComm.php');
                break;
            case 'delete':
                require('./functions/comments/deleteComm.php');
                break;
            default:
                break;
        }
    } else if ($_GET['target'] === 'likes') {
        switch ($_GET['action']) {
            case 'create':
                require('./functions/mentions/addLikes.php');
                break;
            default:               
                break;
        }
    } else if ($_GET['target'] === '404') {
        switch ($_GET['action']) {
            case 'notFound':
                require('./views/404.php');
                break;
            default:
                break;
        }
    }
} else {
    require('./views/accueil.php');
}
