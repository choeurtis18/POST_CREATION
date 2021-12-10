<?php

namespace App\Controller;

use App\Entity\Author;
use App\Fram\Factories\PDOFactory;
use App\Fram\Utils\Flash;
use App\Manager\PostManager;
use App\Manager\CommentManager;
use App\Manager\UserManager;
use App\Entity\User;
use App\Entity\Post;
use App\Entity\Comment;

class UserController extends BaseController
{

    public function executeUser()
    {
        $userManager = new UserManager(PDOFactory::getMysqlConnection());
//        $userId=$_SESSION('user_id');
//
//      $user = $userManager->getUserById($userId);
        $user = $userManager->getAllUsers();

        $this->render(
            'user.php',
            [
                'users' => $user
            ],
            'User Page'
        );
    }

    public function executeDeleteUser()
    {
        $userManager = new UserManager(PDOFactory::getMysqlConnection());
        $user=$userManager->deleteUser($_POST['id']);
        $user->execute();

    }

    public function executeUpdateUser(){

        $userManager = new UserManager(PDOFactory::getMysqlConnection());
        $test="pessi93@gmail.com";
        $user=new User([
            "id" => $_POST['id'],
            "name" => $_POST['lastname'],
            "lastName" => $_POST['firstname'],
            "mail" => $test,
            "password" => $_POST['password'],
            "isAdmin" => (bool)$_POST['isAdmin'],
        ]);
        $_SESSION['firstname']=$user->getname();
        $user=$userManager->updateUser($user);

        header('Location: /user');
    }



}