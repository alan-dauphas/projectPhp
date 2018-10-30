<?php
require('controller/frontend.php');


try
{
  if (empty($_SERVER['QUERY_STRING'])){
    listPosts();
  }
  elseif ($_GET['action'] == "deconnection"){
    disconnectMember();
  }
  elseif ($_GET['action'] == 'post'){
    if (isset($_GET['id']) && $_GET['id'] > 0){
        post();
    }
    else{
      throw new Exception("Erreur : Aucun identifiant de billet envoyé");
    }
  }
  elseif ($_GET['action'] == 'addComment'){
    if (isset($_GET['id']) && $_GET['id'] > 0){
      if (!empty($_POST['author']) && !empty($_POST['comment'])){
          addComment($_GET['id'], $_POST['author'], $_POST['comment']);
      }
      else{
        throw new Exception("Erreur : tous les champs ne sont pas remplis !");
      }
    }
    else{
      throw new Exception("Erreur : aucun identifiant de billet envoyé");
    }
  }
  elseif ($_GET['action'] == 'registration'){
    if ($_GET['action'] == 'registration' && isset($_GET['confirmation']) && $_GET['confirmation'] == 'confirm'){
      if (!empty($_POST['name']) && !empty($_POST['pseudo']) && !empty($_POST['pass']) && !empty($_POST['pass_confirm']) && !empty($_POST['email'])){
        extract($_POST); //permet de ne pas remettre "$_POST" a chaque fois devant les différentes variables
        if(mb_strlen($pseudo) <= 2){
          throw new Exception("Erreur : Pseudo doit comporter au minimum 3 caracteres !");
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
          throw new Exception("Erreur : Mail invalide");
        }
        if (mb_strlen($pass) < 6 || mb_strlen($pass) > 12){
          throw new Exception("Erreur : Votre mot de passe doit comporter entre 6 et 12 caractères");
        }
        if ($pass != $pass_confirm){
          throw new Exception("Erreur : Les mots de passe sont différents !");
        }
        else{
          addMembers($_POST['name'], $_POST['pseudo'], $_POST['pass'], $_POST['email']);
        }
      }
      else{
        throw new Exception("Erreur : tous les champs ne sont pas remplis !");
      }
    }
    else{
      registration();
    }
  }
  elseif ($_GET['action'] == 'connection'){
    connectionMember($_POST['pseudonyme']);

  }
}

catch(Exception $e)
{
  $errorMessage = $e->getMessage();
  require("view/frontend/errorView.php");
}


// $errors = [];
//
// extract($_POST); //permet de ne pas remettre "$_POST" a chaque fois devant les différentes variables
//
// if(mb_strlen($pseudo) < 2)
// {
//   $errors[] = "Votre pseudonyme doit comporter au minimum 3 caractères";
// }
//
// if(!filter_var($mail, FILTER_VALIDATE_EMAIL))
// {
//   $errors[] = "Mail invalide";
// }
//
// if (mb_strlen($pass) < 6 && mb_strlen($pass) > 12)
// {
//   $errors[] = "Votre mot de passe doit comporter entre 6 et 12 caractères";
// }
// else
// {
//   if ($pass != $pass_confirm)
//   {
//     $errors[] = "Les mots de passe sont différents !";
//   }
// }
//
// if(count($errors) == 0)
// {
//   addMembers($_POST['name'], $_POST['pseudo'], $_POST['mail'], $_POST['pass']);
// }
// elseif (count($error) >= 1) {
//   echo $errors;
// }
// }
