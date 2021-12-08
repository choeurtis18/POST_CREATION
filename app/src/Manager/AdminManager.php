<?php

namespace App\Manager;

use App\Entity;

class AdminManager extends UserManager

{
  /**
    * @param int $id
    * @return bool
  */
  public function DeleteUserById(int $id) 
  {
    try {
      $query = $this->db->prepare("DELETE FROM user WHERE id = :ID");
      $query->bindValue(':ID', $ID, \PDO::PARAM_INT);  
      $query->execute();
    }
    catch (\Exception $e) {
      die('Erreur : '.$e->getMessage());
      return "error deleteUserById function in AdminManager.php";
    }  
  }
  
}
