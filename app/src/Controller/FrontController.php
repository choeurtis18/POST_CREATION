<?php

namespace App\Controller;

use App\Entity\Author;
use App\Entity\Comment;
use App\Entity\Post;
use App\Fram\Factories\PDOFactory;
use App\Fram\Utils\Flash;
use App\Manager\PostManager;
use App\Manager\CommentManager;

class FrontController extends BaseController
{
    public function executeHome()
    {
        Flash::setFlash('alert', 'je suis une alerte');
        $commentManager = new CommentManager(PDOFactory::getMysqlConnection());

        $com = new Comment(["id"=>1, "publishedDate"=>"2021-12-08", "content"=>"s", "authorId"=>1]);
        $commentManager->updateComment($com);
        $com = $commentManager->deleteCommentById(1);

        $this->render(
            'home.php',
            [
                'com' => $com,
            ],
            'Home Page'
        );
    }

}