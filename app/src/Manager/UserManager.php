<?php

namespace App\Manager;

use App\Entity\Admin;
use App\Entity\Standard;

abstract class UserManager extends BaseManager
{
  private $bdd;

  public function __construct(\PDO $db){
    $this->setDb($db);
  }

  public function setDb($db){
    $this->db = $db;
    return $this;
  }

  public function getUsers() {
    $db = $this->db;
    $query = "SELECT * FROM `user`";

    $req = $db->prepare($query);
    $req->execute();
    
    while ($row = $req->fetch(\PDO::FETCH_ASSOC)) {
        if($row['isAdmin'] == 1){
            $user = new Admin($row);
        }elseif($row['isAdmin'] == 0){
            $user = new Standard($row);
        }
        $users[] = $user;
    };
    return $users;
  }

  public function getUserById($id) {
    $db = $this->db;
    $query = "SELECT * FROM `user` WHERE id = :id";

    $req = $db->prepare($query);
    $req->bindValue(':id', $id, \PDO::PARAM_INT);

    $req->execute();
    $row = $req->fetch(\PDO::FETCH_ASSOC);
    if($row['isAdmin'] == 1){
        $user = new Admin($row);
    }elseif($row['isAdmin'] == 0){
        $user = new Standard($row);
    }

    return $user;
  }

  public function addUser(string $name, string $lastName, string $mail, string $password, bool $isAdmin) {
    $db = $this->db;
    
    $query = "INSERT INTO `user` (`id`, `name`, `lastName`, `mail`, `password`, `isAdmin`) VALUES (NULL, :namee, :lastName, :mail, :passwrd, :isAdmin)";
    $req = $db->prepare($query);

    if($this->checkName($name) && $this->checkEmail($mail) && $this->checkPassword($password)) {
      $req->bindValue(':namee', $name);
      $req->bindValue(':lastName', $lastName);
      $req->bindValue(':mail', $mail);
      $req->bindValue(':passwrd', $password);
      $req->bindValue(':isAdmin', $isAdmin);
    

      $req->execute();
      return "Bienvenue dans votre espace personnel " . $name . $lastName;

    }
    else {
      
    }
  }

  public function updateUser($ID, $attr, $value) {
    $p = $this->getUserById($ID);
    $db = $this->db;

    $query = "UPDATE `user` SET $attr = $value WHERE `user`.`id` = $ID";
    $req = $db->prepare($query);
    $req->execute();
  }


  public function getUserPosts($id) {
    $db = $this->db;
    $query = "SELECT * FROM `post` WHERE `authorid`= :id";

    $req = $db->prepare($query);
    $req->bindValue(':id', $id, \PDO::PARAM_INT);
    $req->execute();

    while ($row = $req->fetch(\PDO::FETCH_ASSOC)) {
      $posts[] = $row;
    }

    return $posts;
  }

  public function getUserComments($id) {
    $db = $this->db;
    $query = "SELECT * FROM `comment` WHERE `authorid`= :id";

    $req = $db->prepare($query);
    $req->bindValue(':id', $id, \PDO::PARAM_INT);
    $req->execute();

    while ($row = $req->fetch(\PDO::FETCH_ASSOC)) {
      $comments[] = $row;
    }

    return $comments;
  }

  public function getUserPostById($userId, $postId) {
    $db = $this->db;
    $query = "SELECT * FROM `post` WHERE `authorid`= :userid AND ìd`= :postid";

    $req = $db->prepare($query);
    $req->bindValue(':userid', $userId, \PDO::PARAM_INT);
    $req->bindValue(':postid', $postId, \PDO::PARAM_INT);
    $req->execute();

    $row = $req->fetch(\PDO::FETCH_ASSOC);

    return $row;
  }


  public function checkName(string $name) {
    $db = $this->db;
    $query="SELECT * FROM user WHERE `name` = :namee";

    
  }

  public function checkEmail($mail) {
    $db = $this->db;
    $query="SELECT * FROM user WHERE mail = :mail ";
    
    try {
        $req = $db->prepare($query);
        $req->bindValue(':mail', $mail);
        $bool = $req->execute();
        if ($bool) {
            $resultat = $req->fetchAll(\PDO::FETCH_ASSOC);
        }
    }
    catch (\PDOException $e) {
        echo utf8_encode("Echec de select email Ajout : " . $e->getMessage() . "\n");
    }		

    
    if(count($resultat) == 0) return false;
    else return true;
  }

  public function checkPassword() {

  }


}
?>
