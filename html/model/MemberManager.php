<?php
require_once("model/Manager.php");

class MemberManager extends Manager
{
  public function newRegistration($name, $pseudo, $pass, $mail)
  {
    $db = $this->dbConnect();
    $passhash = password_hash($pass, PASSWORD_DEFAULT);
    $members = $db->prepare('INSERT INTO members(name, pseudo, pass, mail, registration_date) VALUES(?, ?, ?, ?, NOW())');
    $newMembers = $members->execute(array($name, $pseudo, $passhash, $mail));

    return $newMembers;
  }

  public function connectionAdministation()
  {

    $db = $this->dbConnect();
    $connection = $db->prepare('SELECT id, pass FROM members WHERE pseudo = ?');
    $connection->execute(array());

  }
}
