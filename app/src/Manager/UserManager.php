<?php

namespace App\Manager;

use App\Entity\Admin;
use App\Entity\Standard;
use App\Entity\Post;
use App\Entity\Comment;
use App\Entity\User;
use PDO;

/**
 *
 */
class UserManager extends BaseManager
{
  private $bdd;

  /**
   * @param PDO $db
   */
  public function __construct(\PDO $db){
    $this->setDb($db);
  }

  /**
   * @param $db
   * @return $this
   */
  public function setDb($db){
    $this->db = $db;
    return $this;
  }

  /**
   * @return User[]|NULL|bool
   */
  public function getAllUsers()
  {
    try {
      $query = $this->db->prepare('SELECT * FROM `user`');
      $query->execute();

      while ($row = $query->fetch(\PDO::FETCH_ASSOC)) {
        if($row['isAdmin'] == 1){
            $user = new Admin($row);
        }elseif($row['isAdmin'] == 0){
            $user = new Standard($row);
        }
        $users[] = $user;
      };
      return $users;
    }
    catch (\Exception $e) {
      die('Erreur : '.$e->getMessage());
      return "error getAllUsers function in UserManager.php";
    } 
  }

  /**
   * @param int $id
   * @return User|NULL|bool
   */
  public function getUserById($id)
  {
    try {
      $query = $this->db->prepare('SELECT * FROM `user` WHERE id = :id');
      $query->bindValue(':id', $id, \PDO::PARAM_INT);

      $query->execute();
      $row = $query->fetch(\PDO::FETCH_ASSOC);
      if($row['isAdmin'] == 1){
        $user = new Admin($row);
      }
      elseif($row['isAdmin'] == 0){
        $user = new Standard($row);
      }
      return $user;
    } 
    catch (\Exception $e) {
      die('Erreur : '.$e->getMessage());
      return "error getUserById function in UserManager.php";
    } 
  }

    /**
   * @param User $user
   * @return User|NULL|bool
   */
  public function getUserByAtribut(User $user)
  {
    try {
      $query = $this->db->prepare('SELECT * FROM `user` WHERE `name` = :namee AND lastName = :lastName AND mail = :mail AND `password` = :passwordd');
      $query->bindValue(':namee', $user->getName(), \PDO::PARAM_INT);
      $query->bindValue(':lastName', $user->getLastName(), \PDO::PARAM_INT);
      $query->bindValue(':mail', $user->getMail(), \PDO::PARAM_INT);
      $query->bindValue(':passwordd', $user->getPassword(), \PDO::PARAM_INT);

      $query->execute();
      $row = $query->fetch(\PDO::FETCH_ASSOC);
      if($row['isAdmin'] == 1){
        $user = new Admin($row);
      }
      elseif($row['isAdmin'] == 0){
        $user = new Standard($row);
      }
      return $user;
    } 
    catch (\Exception $e) {
      die('Erreur : '.$e->getMessage());
      return "error getUserById function in UserManager.php";
    } 
  }

  /**
     * @param User $user
     * @return User||NULL|bool
     */
  public function createUser(User $user) 
  {
    try {
      $query = $this->db->prepare("INSERT INTO `user` (`id`, `name`, `lastName`, `mail`, `password`, `isAdmin`) VALUES (NULL, :namee, :lastName, :mail, :passwrd, :isAdmin)");
      if(!$this->checkEmail($user->getMail())) {
        $query->bindValue(':namee' , $user->getName(), PDO::PARAM_STR);
        $query->bindValue(':lastName', $user->getLastName(), PDO::PARAM_STR);
        $query->bindValue(':mail', $user->getMail(), PDO::PARAM_STR);
        $query->bindValue(':passwrd', $user->getPassword(), PDO::PARAM_STR);
        $query->bindValue(':isAdmin', $user->getIsAdmin(), PDO::PARAM_INT);
        $query->execute();

        return $this->getUserByAtribut($user);
      } else {
        return false;
      }
    }
    catch (\Exception $e) {
      die('Erreur : '.$e->getMessage());
      return "error createUser function in UserManager.php";
    }  
  }

  /**
     * @param User $user
     * @return User||NULL|bool
     */
  public function updateUser(User $user) 
  {
    try {
      $query = $this->db->prepare("UPDATE `user` SET `name` = :namee , `lastName` = :lastName , `mail` = :mail , `password` = :passwrd , `isAdmin` = :isAdmin WHERE `id` = :id");
      $query->bindValue(':namee' , $user->getName(), PDO::PARAM_STR);
      $query->bindValue(':lastName', $user->getLastName(), PDO::PARAM_STR);
      $query->bindValue(':mail', $user->getMail(), PDO::PARAM_STR);
      $query->bindValue(':passwrd', $user->getPassword(), PDO::PARAM_STR);
      $query->bindValue(':isAdmin', $user->getIsAdmin(), PDO::PARAM_INT);
      $query->bindValue(':id', $user->getId(), PDO::PARAM_INT);
      $query->execute();
    }
    catch (\Exception $e) {
      die('Erreur : '.$e->getMessage());
      return "error updateUser function in UserManager.php";
    }

  }

  /**
   * @param int $id
   * @return Post[]|NULL|bool
   */
  public function getUserPosts($id)
  {
    try {
      $query = $this->db->prepare("SELECT * FROM `post` WHERE `authorid`= :id");
      $query->bindValue(':id', $id, \PDO::PARAM_INT);
      $query->execute();
      while ($row = $query->fetch(\PDO::FETCH_ASSOC)) {
        $posts[] = new Post($row);
      }
      return $posts;
    }
    catch(\Exception $e) {
      die('Erreur : '.$e->getMessage());
      return "error getUserPosts function in UserManager.php";
    }

  }

  /**
   * @param int $id
   * @return Comment[]|NULL|bool
   */
  public function getUserComments($id)
  {
    try {
      $query = $this->db->prepare("SELECT * FROM `comment` WHERE `authorid`= :id");
      $query->bindValue(':id', $id, \PDO::PARAM_INT);
      $query->execute();
      while ($row = $query->fetch(\PDO::FETCH_ASSOC)) {
        $comments[] = new Comment($row);
      }
      return $comments;
    }
    catch(\Exception $e) {
      die('Erreur : '.$e->getMessage());
      return "error getUserComments function in UserManager.php";
    }
  }
 
  /**
   * @param string $mail
   * @return bool
   */
  public function checkEmail($mail) 
  {
    try {
      $query = $this->db->prepare("SELECT * FROM user WHERE mail = :mail");
      $query->bindValue(':mail', $mail);
      $bool = $query->execute();
      if ($bool) {
        $resultat = $query->fetchAll(\PDO::FETCH_ASSOC);
      }
      if(count($resultat) == 0) return false;
      else return true;
    }
    catch (\PDOException $e) {
      die('Erreur : '.$e->getMessage());
      return "error checkEmail function in UserManager.php";
    }		
    
    
  }

  /**
   * @param $mail
   * @param $password
   * @return Admin|Standard|void
   */
  public function login($mail, $password)
  {
    try {
      $query = $this->db->prepare('SELECT * FROM user WHERE mail=:mail and password=:password' );
      $query->bindValue(':mail',$mail);
      $query->bindValue(':password',$password);
      $query->execute();

      while ($row = $query->fetch(\PDO::FETCH_ASSOC)) {
        if($row['isAdmin'] == 1){
          $user = new Admin($row);
        }elseif($row['isAdmin'] == 0){
          $user = new Standard($row);
        }
        return $user;
      };


    } catch (\Exception $e) {
      die('Erreur : '.$e->getMessage());
      return "PASBON";
    }
  }


  /**
   * @param $id
   */
  public function deleteUser($id){
    try{
      $query=$this->db->prepare('DELETE FROM user WHERE id=:id');
      $query->bindValue(':id',$id);
      $query->execute();
    }catch (\Exception $e) {
      die('Erreur : '.$e->getMessage());
      return "PASBON";
    }
  }

}
?>
