<?php

namespace App\Manager;

use App\Entity;

class AdminManager extends UserManager

{
  public function DeleteUser($ID) {
    $db = $this->db;
    $query = "DELETE FROM user WHERE id = :ID";

    $req = $db->prepare($query);
    $req->bindValue(':ID', $ID, \PDO::PARAM_INT);  

    $req->execute();
  }

}
