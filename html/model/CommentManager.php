<?php
require_once("Manager.php");
require_once("Comment.php");

class CommentManager extends Manager {

//function for administrationView
  public function readAllComments(){
    $db = $this->dbConnect();
    $req = $db->query('SELECT id, author, comment, reporting, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments ORDER BY reporting DESC, comment_date DESC'); // classement des commentaires par commentaires signaler et par date DESC

    // creer un tableau de posts vide qui sera remplie dans la boucle, ce tableau contiendra des objets post.
    $comments=[];
    $result = $req->fetchAll();
      foreach ($result as $row) { // je parcours toutes mes lignes de ma base de données.
        // $row['id'] contient un id.

        $comment = new Comment(); // j'instancie post, je crée un objet de ma class post.

        $comment->setId($row['id']); // j'hydrate mon objet avec les informations qui sont au dessus.
        $comment->setAuthor($row['author']);
        $comment->setComment($row['comment']);
        $comment->setReporting($row['reporting']);
        $comment->setCommentDateFr($row['comment_date_fr']);

        $comments[] = $comment; // je stock mon objet dans mon tableau d'objet
      }

    return $comments; // retourne le tableau.
  }

//function for comment each post
  public function readComments($postId){
      $db = $this->dbConnect();
      $req = $db->prepare('SELECT id, author, comment, reporting, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
      $req->execute(array($postId));

      $comments=[];
      $result = $req->fetchAll();
      foreach ($result as $row) {

        $comment = new Comment();

        $comment->setId($row['id']);
        $comment->setAuthor($row['author']);
        $comment->setComment($row['comment']);
        $comment->setReporting($row['reporting']);
        $comment->setCommentDateFr($row['comment_date_fr']);

        $comments[] = $comment;
      }

      return $comments;
  }


  public function addComment($postId, $author, $comment){
      $db = $this->dbConnect();
      $addComments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
      $newComments = $addComments->execute(array($postId, $author, $comment));

      return $newComments;
  }

  public function getCommentsAdministration(){
      $db = $this->dbConnect();
      $commentsAdmin = $db->query('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments ORDER BY comment_date DESC LIMIT 0, 50');

      return $commentsAdmin;
  }

  public function deleteCommentManager($id){
    $db = $this->dbConnect();
    $req = $db->prepare('DELETE FROM comments WHERE id = ?');
    $req->execute(array($id));
  }

  public function reportingCommentManager($id){
    $db = $this->dbConnect();
    $req = $db->prepare('UPDATE comments SET reporting = true WHERE id = ?');
    $req->execute(array($id));

    return $req->rowCount();
  }


}
