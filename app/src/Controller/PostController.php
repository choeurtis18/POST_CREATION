<?php

namespace App\Controller;

use App\Entity\Author;
use App\Fram\Factories\PDOFactory;
use App\Fram\Utils\Flash;
use App\Manager\PostManager;
use App\Manager\CommentManager;

class PostController extends BaseController
{
    public function executeShowPost()
    {
        Flash::setFlash('alert', 'je suis une alerte');
        $postManager = new PostManager(PDOFactory::getMysqlConnection());
        $commentManager = new CommentManager(PDOFactory::getMysqlConnection());

        $post = $postManager->getPostById($this->params["id"]);
        $comments = $commentManager->getAllCommentsByPostId($post->getId());
        
        $this->render(
            'post.php',
            [
                'post' => $post,
                'comments' => $comments
            ],
            $post->getTitle()
        );
    }

    public function executeAddComment()
    {
        Flash::setFlash('alert', 'je suis une alerte');
        $postManager = new PostManager(PDOFactory::getMysqlConnection());
        $posts = $postManager->getAllPosts();
        
        //Call add comment function
        $this->render(
            'home.php',
            [
                'posts' => $posts,
                'message' => Null
            ],
            'Home Page'
        );
    }

}