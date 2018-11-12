<?php

class Article extends Manager
{
  /**
  *
  */


    private $id;

    private $title;

    private $content;


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

  public function getPosts(){
    $db = $this->dbConnect();
    $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

// creer un tableau de posts vide qui sera remplie dans la boucle, ce tableau contiendra des objets post.
    $posts=[];

    foreach ($req->fetch() as $row) { // je parcours toutes mes lignes de ma base de données.
      // $row['id'] contient un id.

      $post = new Article(); // j'instancie post, je crée un objet de ma class post.

      $post->setId($row['id']); // j'hydrate mon objet avec les informations qui sont au dessus.
      $post->setTitle($row['title']);
      $post->setContent($row['content']);

      $posts[] = $post; // je stock mon objet dans mon tableau d'objet
    }

    return $posts; // retourne le tableau.

  }
}
