<?php
require_once("Manager.php");


class Comment extends Manager
{
  /**
  *
  */

    private $id;

    private $post_id;

    private $author;

    private $comment;

    private $reporting;

    private $commentDateFr;

    private $row;



// SETTER en anglais Mutateur en francais // sert a modifier les variables private

    public function setId($id){

      $this->id = $id;

    }

    public function setAuthor($author){

      $this->author = $author;

    }

    public function setComment($comment){

      $this->comment = $comment;

    }

    public function setReporting($reporting){

      $this->reporting = $reporting;

    }

    public function setCommentDateFr($commentDateFr){

      $this->commentDateFr = $commentDateFr;

    }

    public function setRow($row){

      $this->row = $row;

    }

// GETTER en anglais Accesseurs en francais // sert a appeler le contenu des variables préalablement modifié

  public function getId(){

  return $this->id;
  }

  public function getAuthor(){

  return htmlspecialchars(ucfirst($this->author));
  }

  public function getComment(){

  return htmlspecialchars(ucfirst($this->comment));
  }

  public function getReporting(){

  return $this->reporting;
  }

  public function getCommentDateFr(){

  return htmlspecialchars($this->commentDateFr);
  }

  public function isSignaled(){

    return $this->reporting;
  }

  public function create($id, $author, $comment, $reporting, $commentDateFr){
  $this->setId($id);
  $this->setAuthor($author);
  $this->setComment($comment);
  $this->setReporting($reporting);
  $this->setCommentDateFr($commentDateFr);
  }
}
