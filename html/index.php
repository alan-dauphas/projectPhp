<?php

session_start();
	require('controller/frontend.php');

// && ($_SESSION['admin']) égal seul l'admin de niveau 1 est autorisé !

try {
	if (empty($_SERVER['QUERY_STRING'])){
		return listPosts();
	}
	elseif ($_GET['action'] == 'post'){
		if (isset($_GET['id']) && $_GET['id'] > 0){
			return postAndComment();
		}
			throw new Exception("Erreur : Aucun identifiant de billet envoyé");
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
				return addMembers($_POST['name'], $_POST['pseudo'], $_POST['pass'], $_POST['email']);
			}
				throw new Exception("Erreur : tous les champs ne sont pas remplis !");
		}
		return registrationView();
	}
	elseif ($_GET['action'] == 'connection'){
		return connectionMember($_POST['pseudonyme']);
	}
	elseif ($_GET['action'] == "deconnection"){
	 	return disconnectMember();
	}
	elseif ($_GET['action'] == "administration" && ($_SESSION['admin'])){
	 	return	administrationPostsAndComments();
	}
	elseif ($_GET['action'] == "allPosts" && ($_SESSION['admin'])){
		return administrationReadAllPosts();
	}
	elseif ($_GET['action'] == "lastThreePosts" && ($_SESSION['admin'])){
	 return	administrationReadLastThreePosts();
	}
	elseif ($_GET['action'] == "addPost" && ($_SESSION['admin'])){
		if ($_GET['action'] == 'addPost' && isset($_GET['newPost']) && $_GET['newPost'] == 'confirm'){
			if (isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['content']) && !empty($_POST['content']) ){
				extract($_POST);
				return addNewPost($title, $content);
			}
				throw new Exception("Erreur : tous les champs ne sont pas remplis !");
		}
		else {
			return newPostView();
		}
	}
	elseif ($_GET['action'] == "deletePost" && ($_SESSION['admin'])){
		if (isset($_GET['id']) && !empty($_GET['id']) && $_SESSION['admin']){
			extract($_GET);
			return delPost($id);
		}
		throw new Exception("Erreur : impossible de supprimer ce post !");
	}
	elseif ($_GET['action'] == "updatePost" && ($_SESSION['admin'])){
		if (isset($_GET['postId']) && !empty($_GET['postId']) && !isset($_GET['modification'])){
			extract($_GET);
			return post($postId);
		}
		if (isset($_GET['modification']) && $_GET['modification'] == "confirm" && $_SESSION['admin']){
			extract($_GET);
			return updatePost($postId);
		}
	}
	elseif ($_GET['action'] == "allComments"){
		return administrationReadAllComments();
	}
	elseif ($_GET['action'] == "allCommentsSignaled"){
		return administrationReadAllCommentsSignaled();
	}
	elseif ($_GET['action'] == 'addComment'){
		if (isset($_GET['id']) && $_GET['id'] > 0){
			if ((isset($_POST['author']) && strlen(trim($_POST['author'])) > 0) && (isset($_POST['comment']) && strlen(trim($_POST['comment'])) > 0)){
				//Ses conditions permettent de ne pas avoir l'injection d'espace dans la base de données (commentaire qui serait remplis d'espace).
			return newComment($_GET['id'], $_POST['author'], $_POST['comment']);
			}
				throw new Exception("Erreur : tous les champs ne sont pas remplis !");
		}
			throw new Exception("Erreur : aucun identifiant de billet reçu");
	}
	elseif ($_GET['action'] == "deleteComm" && ($_SESSION['admin'])){
		if (isset($_GET['id']) && !empty($_GET['id']) && ($_SESSION['admin'])){
			extract($_GET);
			return delComment($id);
		}
			throw new Exception("Erreur : impossible de supprimer ce commentaire !");

	}
	elseif ($_GET['action'] == "reporting"){
		if (isset($_GET['comment_id']) && !empty($_GET['comment_id'])){
			reportingComment($_GET['comment_id']);
		}
	}
}
catch(Exception $e)
{
	$errorMessage = $e->getMessage();
	require("view/frontend/errorView.php");
}
