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
        $post = $postManager->getPostById($this->params["id"]);
        
        //Call add comment function
        $this->render(
            'post.php',
            [
                'post' => $post,
                'message' => Null
            ],
            'Home Page'
        );
    }
    public function executeAddPost()
    {
        Flash::setFlash('alert', 'je suis une alerte');
        
        //Call add post function
        $this->render(
            'add-post.php',
            [
                'message' => Null
            ],
            'Home Page'
        );
    }

    public function executeSubmitPost() 
    {
        Flash::setFlash('alert', 'je suis une alerte');
        $postManager = new PostManager(PDOFactory::getMysqlConnection());
        $p = new Post(["publishedDate"=>date("Y-m-d"), "title"=>$_POST['post-title'], "authorId"=>$_POST['author-id'], "content"=>$_POST['post-content']]);
        $post = $postManager->createPost($p);
        
        header('Location: /');
        
    }

    public function executeSubmitComment() 
    {
        Flash::setFlash('alert', 'je suis une alerte');
        $commentManager = new CommentManager(PDOFactory::getMysqlConnection());
        $postManager = new PostManager(PDOFactory::getMysqlConnection());
        
        $c = new Comment(["publishedDate"=>date("Y-m-d"), "content"=>$_POST['comment-content'], "authorId"=>$_POST['author-id'], "postId"=>$_POST['post-id']]);
        $comment = $commentManager->createComment($c);
        $post = $postManager->getPostById($_POST['post-id']);
        $comments = $commentManager->getAllCommentsByPostId($post->getId());
        

        $header = "Location: /post/" . $post->getId();
        header($header);
        $this->render(
            'post.php',
            [
                'post' => $post,
                'comments' => $comments
            ],
            $post->getTitle()
        );
        
        
    }


    public function executeShowUserPost()
    {
        Flash::setFlash('alert', 'je suis une alerte');
        $postManager = new UserManager(PDOFactory::getMysqlConnection());
        $posts = $postManager->getUserPosts($_SESSION["user_id"]);
        $user = $postManager->getUserById($_SESSION["user_id"]);


        $this->render(
            'user-post.php',
            [
                'posts' => $posts
            ],
            $user->getName().' posts'
        );
    }
}