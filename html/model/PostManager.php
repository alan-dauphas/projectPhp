<?php
require_once("Manager.php");
require_once("Post.php");

class PostManager extends Manager
{

// function qui affiche tous les 5 derniers posts sur la page d'acceuil.
  public function readAllPosts()
  {
    $db = $this->dbConnect();
    $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

    // creer un tableau de posts vide qui sera remplie dans la boucle, ce tableau contiendra des objets post.
    $posts=[];
    $result = $req->fetchAll();
    foreach ($result as $row) { // je parcours toutes mes lignes de ma base de données.
      // $row['id'] contient un id.

      $post = new Post(); // j'instancie post, je crée un objet de ma class post.

      $post->create($row['id'], $row['title'], $row['content'], $row['creation_date_fr']);

      $posts[] = $post; // je stock mon objet dans mon tableau d'objet
    }

    return $posts; // retourne le tableau.
  }

// function qui affiche le post choisie."voir plus"
  public function readPost($postId)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
    $req->execute(array($postId));

    $row = $req->fetch();

      $post = new Post();

      $post->setTitle($row['title']);
      $post->setContent($row['content']);
      $post->setCreationDateFr($row['creation_date_fr']);


    return $post;
  }

// affiche les 3 derniers posts sur la page d'administration.
  public function lastPostsAdministration($max = 6)
  {
    $db = $this->dbConnect();
    $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, ' . $max);

    $posts=[];
    $result = $req->fetchAll();
    foreach ($result as $row)
    {
      $post = new Post();

      $post->create($row['id'], $row['title'], $row['content'], $row['creation_date_fr']);

      $posts[] = $post;
    }
    return $posts;
  }

// ajouter un post
  public function newPost($title, $content)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES (?, ?, NOW())');
    return $req->execute(array($title, $content));
  }

  //modifier un posts
  public function updatePostManager($postId)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('UPDATE posts SET title = ?, content = ? WHERE id =  ?' );
    $req->execute(array($_POST['title'], $_POST['content'], $postId));
  }

  //supprimer un post
  public function deletePost($postId)
  {
    $db = $this->dbConnect();
    $req = $db->prepare('DELETE FROM posts WHERE id = ?');
    $req->execute(array($postId));
    return $req->rowCount();
      }

}
