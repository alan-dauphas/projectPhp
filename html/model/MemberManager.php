<?php
require_once("model/Manager.php");

class MemberManager extends Manager
{
  public function newRegistration($name, $pseudo, $pass, $email)
  {
    $db = $this->dbConnect();
    $passHash = password_hash($pass, PASSWORD_DEFAULT);
    $members = $db->prepare('INSERT INTO members(name, pseudo, pass, mail, registration_date) VALUES(?, ?, ?, ?, NOW())');
    $newMembers = $members->execute(array($name, $pseudo, $passHash, $email));

    return $newMembers;
  }

  public function connectionAdministation($pseudonyme)
  {

    $db = $this->dbConnect();
    $connection = $db->prepare('SELECT id, pass, admin FROM members WHERE pseudo = :pseudo');
    $connection->execute(array('pseudo' => $pseudonyme));
    $resultat = $connection->fetch();

    $PasswordCorrect = password_verify($_POST['passConnection'], $resultat['pass']);

    if(!$PasswordCorrect){
      throw new Exception("Erreur : Utilisateur ou mot de passe non reconnu");

    }
    else {
      session_start();
      $_SESSION['id'] = $resultat['id'];
      $_SESSION['pseudo'] = $pseudonyme;
      $_SESSION['admin'] = $resultat['admin'];


    }


      return $resultat;
  }
}
