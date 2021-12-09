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
            $postManager = new PostManager(PDOFactory::getMysqlConnection());
            $posts = $postManager->getAllPosts();

            header('Location: /');
            $this->render(
                'home.php',
                [
                    'posts' => $posts,
                    'user' => $loggedInUser
                ],
                'Home Page'
            );
        } else {
            $this->render(
                'login.php',
                [
                ],
                'Login Page'
            );
        }
    }


    public function createUserSession($user) {
        $_SESSION['user_id'] = $user->getId();
        $_SESSION['username'] = $user->getName();
        $_SESSION['email'] = $user->getMail();
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


        $postManager = new PostManager(PDOFactory::getMysqlConnection());
        $posts = $postManager->getAllPosts();
        $this->render(
            'home.php',
            [
                'posts' => $posts,
                'user' => $new_user
            ],
            'Home Page'
        );
    }

    public function executeLogout(){

    }


}