<?php



class Article
{
  /**
  * @var string $reference référence de l'article
  */


    public $id;

    private $title;

    private $content;


// SETTER

    public function setId($id){

      $this->id = $id;

    }

    public function setTitle($title){

      $this->title = $title;

    }

    public function setContent($content){

      $this->content = $content;

    }


// GETTER

  public function getId(){

  return $this->id;

  }


  public function getTitle(){

  return htmlspecialchars($this->title);

  }

  public function getContent(){

  return htmlspecialchars($this->content);

  }
}
