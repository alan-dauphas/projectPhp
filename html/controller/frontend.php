<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/MemberManager.php');


//demande l'affichage de tous les posts pour la page d'acceuil
function listPosts(){
    $postManager = new PostManager();
    $posts = $postManager->readAllPosts();

    require('view/frontend/listPostsView.php');
}

//demande l'affichage d'un post
function post($postId){
  $postManager = new PostManager();
  $post = $postManager->readPost($postId);

  require('view/frontend/updatePostView.php');
}

//demande l'affichage d'un post et ses commentaires
function postAndComment(){
  $postManager = new PostManager();
  $post = $postManager->readPost($_GET['id']);

  $commentManager = new CommentManager();
  $comments = $commentManager->readComments($_GET['id']);

  require('view/frontend/postView.php');
}

// Partie Membres, Connexion, Déconnexion,


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

function registrationView(){
  require('view/frontend/registrationView.php');
}

// Administration
function administrationPostsAndComments(){
  $postManager = new PostManager();
  $posts = $postManager->lastPostsAdministration();

  $commentManager = new CommentManager();
  $comments = $commentManager->readAllComments();

  require('view/frontend/administrationView.php');
}

function administrationReadAllPosts(){
  $postManager = new PostManager();
  $posts = $postManager->readAllPosts();

  require('view/frontend/allPostsView.php');

}

function administrationReadLastThreePosts(){
  $postManager = new PostManager();
  $posts = $postManager->lastPostsAdministration();

  require('view/frontend/lastThreePostsView.php');

}

function administrationReadAllComments(){
  $commentManager = new CommentManager();
  $comments = $commentManager->readAllComments();

  require('view/frontend/allCommentsView.php');
}

function administrationReadAllCommentsSignaled(){
  $commentManager = new CommentManager();
  $comments = $commentManager->readAllCommentsSignaled();

  require('view/frontend/commentsSignaledView.php');

}

function newPostView(){
  require('view/frontend/addPostView.php');
}

function addNewPost($title, $content){
  $newPostManager = new PostManager();

  $newPost = $newPostManager->newPost($title, $content);

  if ($newPost === false)
  {
    throw new Exception('impossible d\'ajouter un nouveau post !');
  }
  else
  {
    header('Location: index.php?action=administration');
    exit();
  }
}

function delPost($postId){
  $delPostManager = new PostManager();

  $delPost = $delPostManager->deletePost($postId);

  if ($delPost === 0)
  {
    throw new Exception('impossible de supprimer ce post !');
  }
  else
  {
    header('Location: index.php?action=administration');
    exit();
  }
}

function updatePost($postId){
  $updatePostManager = new PostManager();

  $updatePost = $updatePostManager->updatePostManager($postId);

  if ($updatePost === false)
  {
    throw new Exception('impossible de modifier ce post !');
  }
  else
  {
    header('Location: index.php?action=administration');
    exit();
  }
}

function newComment($postId, $author, $comment){

  $commentManager = new CommentManager();

  $newComments = $commentManager->addComment($postId, $author, $comment);

  if ($newComments === false) {
    throw new Exception('Impossible d\'ajouter le commentaire !');
  }
  else
  {
    header('Location: index.php?action=post&id=' . $postId);
    exit();
  }
}

function delComment($id){
  $delCommentManager = new CommentManager();

  $delComment = $delCommentManager->deleteCommentManager($id);

  if ($delComment === false)
  {
    throw new Exception('impossible de supprimer ce commentaire !');
  }
  else
  {
    header('Location: index.php?action=administration');
    exit();
  }
}

function reportingComment($id){
  $reportingCommentManager = new CommentManager();

  $reportingComment = $reportingCommentManager->reportingCommentManager($id);

  if ($reportingComment === false)
  {
    throw new Exception('Impossible de signaler ce commentaire !');
  }
  else
  {
    header('Location: index.php?action=post&id=' . $_GET['id']);
    exit();
  }
}


// require de test
