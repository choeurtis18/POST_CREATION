<?php

namespace App\Controller;

use App\Entity\Author;
use App\Fram\Factories\PDOFactory;
use App\Fram\Utils\Flash;
use App\Manager\PostManager;

class FrontController extends BaseController
{
    public function executeHome()
    {
        Flash::setFlash('alert', 'je suis une alerte');
        $postManager = new PostManager(PDOFactory::getMysqlConnection());
        $posts = $postManager->getAllPosts();
        $this->render(
            'home.php',
            [
                'posts' => $posts
            ],
            'Home Page'
        );
    }

}