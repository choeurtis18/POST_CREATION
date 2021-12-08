<?php

namespace App\Controller;

use App\Entity\Author;
use App\Fram\Factories\PDOFactory;
use App\Fram\Utils\Flash;
use App\Manager\PostManager;
use App\Manager\UserManager;
use App\Manager\AdminManager;

class FrontController extends BaseController
{
    public function executeHome()
    {
        Flash::setFlash('alert', 'je suis une alerte');
        $postManager = new PostManager(PDOFactory::getMysqlConnection());
        $userManager = new UserManager(PDOFactory::getMysqlConnection());
        $adminManager = new AdminManager(PDOFactory::getMysqlConnection());
        $posts = $postManager->getAllPosts();

        $users = $userManager->getUsers();
        $getUser1 = $userManager->getUserById(1);
        $addUser1 = $userManager->addUser("john", "Doe", "john.doe@mail.fr", "lol123", 1);
        $addUser2 = $userManager->addUser("julia", "Doe", "john.doe@mail.fr", "lol123", 0);
        $updateUser1 = $userManager->updateUser(3, 'isAdmin', 1);
        $user1Posts = $userManager->getUserPosts(1);
        $deleteUser1 = $adminManager->DeleteUser(3);

        $this->render(
            'home.php',
            [
                'posts' => $posts,

                'users' => $users,
                'getUser1' => $getUser1,
                'addUser1' => $addUser1,
                'addUser2' => $addUser2,
                'user1Posts' => $user1Posts,
                'deleteUser1' => $deleteUser1
            ],
            'Home Page'
        );
    }

}