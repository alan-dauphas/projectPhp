<?php
require_once("Manager.php");
require_once("Comment.php");

class CommentManager extends Manager {
  public function getComments($postId){
      $db = $this->dbConnect();
      $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
      $comments->execute(array($postId));

      return $comments;
  }

  public function postComment($postId, $author, $comment){
      $db = $this->dbConnect();
      $addcomments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
      $newComments = $addcomments->execute(array($postId, $author, $comment));

      return $newComments;
  }

  public function getCommentsAdministration(){
      $db = $this->dbConnect();
      $commentsAdmin = $db->query('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments  ORDER BY comment_date DESC LIMIT 0, 50');

      return $commentsAdmin;
  }

  public function deleteComment($id){
    $db = $this->dbConnect();
    $req = $db->prepare('DELETE FROM comments WHERE id = ?');
    $req->execute(array($id));
  }
}
