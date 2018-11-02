<?php
require_once("Manager.php");

class PostManager extends Manager{
  public function getPosts(){
    $db = $this->dbConnect();
    $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

    return $req;
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
    $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

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
}
