<?php

namespace App\Controller;

use App\Entity\Author;
use App\Entity\User;
use App\Entity\Admin;
use App\Fram\Factories\PDOFactory;
use App\Fram\Utils\Flash;
use App\Manager\PostManager;
use App\Manager\UserManager;

class SecurityController extends BaseController{

    public function executeLogin(){
        $this->render(
            'login.php',
            [
            ],
            'Login Page'
        );
    }

    public function executeLoginFunction(){
        $userManager = new UserManager(PDOFactory::getMysqlConnection());
        $username=$_POST['mail'];
        $password=$_POST['password'];

        $loggedInUser = $userManager->login($username,$password);
        if ($loggedInUser) {
            $this->createUserSession($loggedInUser);
            header('Location: /');
        } else {
            header("Location: /login?error_message=erreur connexion");
        }
    }


    public function createUserSession($user) {
        $_SESSION['user_id'] = $user->getId();
        $_SESSION['lastname'] = $user->getLastName();
        $_SESSION['firstname'] = $user->getName();
        $_SESSION['email'] = $user->getMail();
        $_SESSION['password'] = $user->getPassword();
        $_SESSION['admin'] = $user->getIsAdmin();

    }


    public function executeRegister(){
        $this->render(
            'register.php',
            [
            ],
            'Register Page'
        );
    }

    public function executeRegisterFunction(){
        $userManager = new UserManager(PDOFactory::getMysqlConnection());

        $user=new User([
            "name" => $_POST['name'],
            "lastName" => $_POST['firstname'],
            "mail" => $_POST['mail'],
            "password" => $_POST['password'],
            "isAdmin" => (bool)$_POST['isAdmin'],
        ]);

        $new_user=$userManager->createUser($user);
        if($new_user != false) {
            $postManager = new PostManager(PDOFactory::getMysqlConnection());
            $posts = $postManager->getAllPosts();
            $this->createUserSession($new_user);
            header("Location: /");
        } else {
            header("Location: /register?error_message=erreur inscription");
        }
    }

    public function executeLogout(){
        $this->exitUserSession();
    }

    public function exitUserSession() {
        $_SESSION['user_id'] = Null;
        $_SESSION['firstname'] = Null;
        $_SESSION['lastname'] = Null;
        $_SESSION['email'] = Null;
        $_SESSION['password'] = Null;
        $_SESSION['admin'] = Null;

        header('Location: /');
    }
}