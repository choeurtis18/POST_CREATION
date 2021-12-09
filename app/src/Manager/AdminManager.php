<?php

namespace App\Manager;

use App\Entity;

class AdminManager extends UserManager

{
  /**
    * @param int $id
    * @return bool|NULL|bool
  */
  public function deleteUserById(int $id) 
  {
    try {
      $query = $this->db->prepare("DELETE FROM user WHERE id = :ID");
      $query->bindValue(':ID', $id, \PDO::PARAM_INT);  
      $query->execute();
      return true;
    }
    catch (\Exception $e) {
      die('Erreur : '.$e->getMessage());
      return "error deleteUserById function in AdminManager.php";
    }  
  }
  
}
