<?php

namespace App\Manager;

use App\Entity;

class AdminManager extends UserManager

{

  public function DisplayUsersList() {

  }
  
  public function DeleteUser($ID) {
    $db = $this->db;
    $query = "SELECT * FROM `user` WHERE id = :ID";
    $req = $db->prepare($query);
    $req->bindValue(':ID', $ID, \PDO::PARAM_INT);

    if($query)
    $query = "DELETE FROM user WHERE id = :ID";

    

    $req->execute();
  }

}
