<?php
require_once("model/Manager.php");

class MemberManager extends Manager
{
  public function newRegistration($name, $pseudo, $pass, $email)
  {
    $db = $this->dbConnect();
    $passhash = password_hash($pass, PASSWORD_DEFAULT);
    $members = $db->prepare('INSERT INTO members(name, pseudo, pass, mail, registration_date) VALUES(?, ?, ?, ?, NOW())');
    $newMembers = $members->execute(array($name, $pseudo, $passhash, $email));

    return $newMembers;
  }

  public function connectionAdministation($pseudonyme)
  {

    $db = $this->dbConnect();
    $connection = $db->prepare('SELECT id, pass FROM members WHERE pseudo = :pseudo');
    $newConnection = $connection->execute(array('pseudo' => $_POST['pseudonyme']));
    $resultat = $newConnection->fetch();

    $isPasswordCorrect = password_verify($_POST['passConnection'], $resultat['pass']);


      return $newConnection;
  }
}
