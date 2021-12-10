<?php

namespace App\Controller;

use App\Entity\Author;
use App\Fram\Factories\PDOFactory;
use App\Fram\Utils\Flash;
use App\Manager\PostManager;
use App\Manager\CommentManager;
use App\Manager\UserManager;
use App\Entity\Post;
use App\Entity\Comment;

class AdminController extends BaseController
{

    public function executeAdmin()
    {
        $userManager = new UserManager(PDOFactory::getMysqlConnection());
        $users = $userManager->getAllUsers();

        $this->render(
            'admin.php',
            [
                'users' => $users
            ],
            'Admin Page'
        );
    }

    public function executeDeleteUser()
    {
        $userManager = new UserManager(PDOFactory::getMysqlConnection());
        $id=$_POST['id'];

        $user=$userManager->deleteUser($id);

    }


}
