<?php

namespace App\Manager;

use App\Entity\User;

abstract class UserManager extends BaseManager
{
  private $bdd;

  public function __construct(PDO $db){
    $this->setDb($db);
  }

  public function setDb($db){
    $this->db = $db;
    return $this;
  }

  public function getUsers() {
    $db = $this->db;
    $query = "SELECT * FROM ``";

    $req = $db->prepare($query);
    $req->execute();
    
    while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
        if($row['isAdmin'] == 1){
            $user = new Admin($row);
        }elseif($row['isAdmin'] == 0){
            $user = new Standard($row);
        }
        $users[] = $user;
    };
    return $users;
  }

  public function getUserById() {

  }

  public function addUser() {

  }

  public function updateUser() {

  }


  public function getUserPosts() {

  }

  public function getUserComments() {

  }


  public function checkName() {

  }

  public function checkEmail() {

  }

  public function checkPassword() {

  }


}

  $db = new Dbconnexion();
  $manage = new UserManager($db->connection());

  $users = $manage->getUsers();
  if($users != NULL) {
    foreach($users as $user) {
      var_dump($user->getID());
      var_dump($user->getNom());
      var_dump($user->getType());
    }
  }

?>
