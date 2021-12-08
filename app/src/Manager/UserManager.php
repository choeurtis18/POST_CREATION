<?php

namespace App\Manager;

use App\Entity\Admin;
use App\Entity\Standard;
use App\Entity\Post;
use App\Entity\Comment;

class UserManager extends BaseManager
{
  private $bdd;

  public function __construct(\PDO $db){
    $this->setDb($db);
  }

  public function setDb($db){
    $this->db = $db;
    return $this;
  }

  /**
   * Permet d'afficher la liste des Users
   *
   * @return array
   */
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

  /**
   * Permet de séléctionner un user grâce à son id
   *
   * @param int id
   * @return string
   */
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

  /**
   * permet d'ajouter un user
   *
   * @param string $name
   * @param string $lastName
   * @param string $mail
   * @param string $password
   * @param boolean $isAdmin
   * @return string
   */
  public function addUser(string $name, string $lastName, string $mail, string $password, bool $isAdmin) {
    $db = $this->db;
    
    $query = "INSERT INTO `user` (`id`, `name`, `lastName`, `mail`, `password`, `isAdmin`) VALUES (NULL, :namee, :lastName, :mail, :passwrd, :isAdmin)";
    $req = $db->prepare($query);

    if(!$this->checkEmail($mail)) {
      $req->bindValue(':namee', $name);
      $req->bindValue(':lastName', $lastName);
      $req->bindValue(':mail', $mail);
      $req->bindValue(':passwrd', $password);
      $req->bindValue(':isAdmin', $isAdmin);
    

      $req->execute();
      return "Bienvenue dans votre espace personnel " . $name . " " . $lastName;

    }
    else {
      return "Un compte a déjà été créé avec cet email. Merci d'en utiliser un autre.";
    }
  }

  /**
   * permet de modifier l'attribut d'un user selon son id
   *
   * @param int $ID
   * @param string $attr
   * @param string/int $value
   * @return void
   */
  public function updateUser($ID, $attr, $value) {
    $db = $this->db;

    $query = "UPDATE `user` SET $attr = $value WHERE `user`.`id` = :ID";
    $req = $db->prepare($query);
    $req->bindValue(':ID', $ID, \PDO::PARAM_INT);

    $req->execute();
  }

  /**
   * permet de récupérer tous les posts d'un user selon son id
   *
   * @param int $id
   * @return array
   */
  public function getUserPosts($id) {
    $db = $this->db;
    $query = "SELECT * FROM `post` WHERE `authorid`= :id";

    $req = $db->prepare($query);
    $req->bindValue(':id', $id, \PDO::PARAM_INT);
    $req->execute();

    while ($row = $req->fetch(\PDO::FETCH_ASSOC)) {
      $posts[] = new Post($row);
    }

    return $posts;
  }

  /**
   * permet de récupérer tous les commentaires d'un user selon son id
   *
   * @param int $id
   * @return array
   */
  public function getUserComments($id) {
    $db = $this->db;
    $query = "SELECT * FROM `comment` WHERE `authorid`= :id";

    $req = $db->prepare($query);
    $req->bindValue(':id', $id, \PDO::PARAM_INT);
    $req->execute();

    while ($row = $req->fetch(\PDO::FETCH_ASSOC)) {
      $comments[] = new Comment($row);
    }

    return $comments;
  }
 
  /**
   * permet de vérifier que le mail n'a pas été utiliser par un autre user
   *
   * @param string $mail
   * @return bool
   */
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

}
?>
