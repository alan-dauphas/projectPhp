<?php
require_once("Manager.php");
require_once("Article.php");

class PostManager extends Manager{


  public function getPosts(){
    $db = $this->dbConnect();
    $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

// creer un tableau de posts vide qui sera remplie dans la boucle, ce tableau contiendra des objets post.
    $posts=[];
    $result = $req->fetchAll();
    foreach ($result as $row) { // je parcours toutes mes lignes de ma base de données.
      // $row['id'] contient un id.

      $post = new Article(); // j'instancie post, je crée un objet de ma class post.

      $post->setId($row['id']); // j'hydrate mon objet avec les informations qui sont au dessus.
      $post->setTitle($row['title']);
      $post->setContent($row['content']);
      $post->setCreationDateFr($row['creation_date_fr']);

      $posts[] = $post; // je stock mon objet dans mon tableau d'objet
    }

    return $posts; // retourne le tableau.
  }



  public function getPost($postId){
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();

    return $post;
  }

// affiche les 3 derniers posts sur la page d'administration.
  public function getPostsAdministration(){
    $db = $this->dbConnect();
    $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 3');

    return $req;
  }
// ajouter un post
  public function newPost($title, $content){
    $db = $this->dbConnect();
    $req = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES (?, ?, NOW())');
    $newPost = $req->execute(array($title, $content));
  }
//supprimer un post
  public function deletePost($postId){
    $db = $this->dbConnect();
    $req = $db->prepare('DELETE FROM posts WHERE id = ?');
    $req->execute(array($postId));
  }
//modifier un posts
  public function updatePost($postId){
    $db = $this->dbConnect();
    $req = $db->prepare('UPDATE posts SET title = ?, content = ? WHERE id =  ?' );
    $req->execute(array($_POST['title'], $_POST['content'], $postId));
  }






}
