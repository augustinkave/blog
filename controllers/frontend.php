<?php

require_once '../models/PostManager.php';
require_once '../models/CommentManager.php';

use models\PostManager;
use models\CommentManager;

function listPost() {

    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    require '../views/frontend/listPostsView.php';
}

function post() {
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require '../view/frontend/postView.php';
}

function addComment($postId, $author, $comment) {
    $commentManager = new CommentManager();

    $affectedlines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedlines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    } else {
        header('Location: index.php?action=post&id='. $postId);
    }
}