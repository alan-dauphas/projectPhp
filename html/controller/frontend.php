<?php

require('/model/frontend.php');

function listPosts()
{
    $posts = getPosts();

    require('/view/frontend/listPostsView.php');
}

function post()
{
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);

    require('/view/frontend/postView.php');
}


function addComment($postId, $author, $comment)
{
  $newComments = postComment($postId, $author, $comment);

  if ($newComments === false) {
    die ('impossible d\'ajouter le commentaire !');
  }
  else
  {
    header('Location: index.php?action=post&id=' . $postId);
    exit();
  }
}

function signIn()
{
  require('/view/frontend/registration.php');
}

function addMembers($name, $pseudo, $pass, $mail)
{
  $newMembers = newRegistration($name, $pseudo, $pass, $mail);

  if ($newMembers === false)
  {
    die ('impossible de vous enregistré !');
  }
  else
  {


    header('Location: index.php');

    exit();
  }
}
