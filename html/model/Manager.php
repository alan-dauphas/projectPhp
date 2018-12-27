<?php

class Manager
{

  protected function dbConnect()
  {
        $credentials = $this->getCredential();

        return new PDO($credentials['dsn'], $credentials['user'], $credentials['pwd']);
  }

  private function getCredential()
  {
    return require "../config/config.php";
  }

}
