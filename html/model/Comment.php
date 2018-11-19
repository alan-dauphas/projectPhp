<?php

class Comment extends Manager
{
  /**
  *
  */

    private $id;

    private $title;

    private $content;

    private $creationDateFr;

    private $row;



// SETTER en anglais Mutateur en francais // sert a modifier les variables private

    public function setId($id){

      $this->id = $id;

    }

    public function setTitle($title){

      $this->title = $title;

    }

    public function setContent($content){

      $this->content = $content;

    }

    public function setCreationDateFr($creationDateFr){

      $this->creationDateFr = $creationDateFr;

    }

    public function setRow($row){

      $this->row = $row;

    }

// GETTER en anglais Accesseurs en francais // sert a appeler le contenu des variables préalablement modifié

  public function getId(){

  return $this->id;
  }


  public function getTitle(){

  return htmlspecialchars($this->title);
  }

  public function getContent(){

  return htmlspecialchars($this->content);
  }

  public function getCreationDateFr(){

  return htmlspecialchars($this->creationDateFr);
  }

}
