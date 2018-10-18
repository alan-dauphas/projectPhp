<?php

function getBillet()
{

$req = dbConnect()->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

return $req;

}

function dbConnect(){

  try {
    $db = new PDO('mysql:host=localhost;dbname=projectPhp;charset=utf8', 'root', '');
    return $db;
  }
  catch (Exception $e)
  {
    die('Erreur : ' . $e->getMessage());
  }
}

?>
