<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/MemberManager.php');

/**
 *
 */
// class PostController
// {
//
//   function __construct(argument)
//   {
//     // code...*
//   }
// }

function listPosts(){
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    require('/view/frontend/listPostsView.php');
}
function post(){
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('/view/frontend/postView.php');
}
function addComment($postId, $author, $comment){

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

// Partie Membres, Connexion, Déconnexion,
function registration(){
  require('/view/frontend/registrationView.php');
}
function addMembers($name, $pseudo, $pass, $email){

  $newMembersManager = new MemberManager();

  $newMembers = $newMembersManager->newRegistration($name, $pseudo, $pass, $email);

  if ($newMembers === false){
    throw new Exception('impossible d\'ajouter un nouveau membre !');
  }
  else{
    header('Location: index.php');
    exit();
  }
}
function connectionMember($pseudonyme){

  $connectionAdmistration = new MemberManager();

  $connectionMember = $connectionAdmistration->connectionAdministation($pseudonyme);

  if ($connectionMember === false){
    throw new Exception('impossible de ce connecter!');
  }
  else{
    header('Location: index.php?action=administration');
    exit();
  }
}
function disconnectMember(){
  session_start();
  session_destroy();
  setcookie('login', '');
  setcookie('passHash', '');
  header("Location: index.php");
  exit();
}

// Administration
function administrationPostsComments(){
  $postsAdministration = new PostManager();
  $commentAdministration = new CommentManager();

  $postAdmin = $postsAdministration->getPostsAdministration();
  $commentsAdmin = $commentAdministration->getCommentsAdministration();

  require('/view/frontend/administrationView.php');
}
function newPostView(){
  require('/view/frontend/addPostView.php');
}
function addNewPost($postId){
  $newPostManager = new PostManager();

  $newPost = $newPostManager->newPost($title, $content);

  if ($newPost === false){
    throw new Exception('impossible d\'ajouter un nouveau post !');
  }
  else{
    header('Location: index.php');
    exit();
  }
}
function delPost($postId){
  $delPostManager = new PostManager();

  $delPost = $delPostManager->deletePost($postId);

  if ($postID === false){
    throw new Exception('impossible de supprimer ce post !');
  }
  else{
    header('Location: index.php');
    exit();
  }
}
function delComment($id){
  $delCommentManager = new CommentManager();

  $delComment = $delCommentManager->deleteComment($id);

  if ($id === false){
    throw new Exception('impossible de supprimer ce commentaire !');
  }
  else{
    header('Location: index.php');
    exit();
  }
}
