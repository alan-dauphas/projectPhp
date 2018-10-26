<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/RegistrationManager.php');

function listPosts()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    require('/view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('/view/frontend/postView.php');
}


function addComment($postId, $author, $comment)
{

  $commentManager = new CommentManager();

  $newComments = $commentManager->postComment($postId, $author, $comment);

  if ($newComments === false) {
    throw new Exception('Impossible d\'ajouter le commentaire !');
  }
  else
  {
    header('Location: index.php?action=post&id=' . $postId);
    exit();
  }
}

function registration()
{
  require('/view/frontend/registrationView.php');
}

function addMembers($name, $pseudo, $pass, $mail)
{

  $newMembersManager = new RegistrationManager();

  $newMembers = $newMembersManager->newRegistration($name, $pseudo, $pass, $mail);

  if ($newMembers === false)
  {
    throw new Exception('impossible d\'ajouter un nouveau membre !');
  }
  else
  {
    header('Location: index.php');
    exit();
  }
}

function login()
{
  require('/view/frontend/connectionView.php');
}
