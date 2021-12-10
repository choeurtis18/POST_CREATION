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
            'Add Comment'
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
            'Add Post'
        );
    }

    public function executeSubmitPost() 
    {
        Flash::setFlash('alert', 'je suis une alerte');
        $postManager = new PostManager(PDOFactory::getMysqlConnection());
        $p = new Post(["publishedDate"=>date("Y-m-d"), "title"=>$_POST['post-title'], "authorId"=>$_POST['author-id'], "content"=>$_POST['post-content']]);
        $post = $postManager->createPost($p);
        
        header('Location: /user-post/');
        
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

    public function executeEditPost() {
        Flash::setFlash('alert', 'je suis une alerte');
        $postManager = new PostManager(PDOFactory::getMysqlConnection());
        $post = $postManager->getPostById($this->params["id"]);
        
        $this->render(
            'edit-post.php',
            [  
                'post' => $post,
                'message' => Null
            ],
            'Edit Post'
        );
    }

    public function executeSubmitEditPost() {
        Flash::setFlash('alert', 'je suis une alerte');
        $postManager = new PostManager(PDOFactory::getMysqlConnection());
        
        $p = new Post(["title"=>$_POST['post-title'], "content"=>$_POST['post-content'], "publishedDate"=>date("Y-m-d"), "authorId"=>$_POST['author-id'], "id"=>$_POST['post-id']]);
        $post = $postManager->updatePost($p);
        
        header('Location: /user-post/');
    }

    public function executeEditComment() {
        Flash::setFlash('alert', 'je suis une alerte');
        $commentManager = new CommentManager(PDOFactory::getMysqlConnection());
        $comment = $commentManager->getCommentById($this->params["id"]);
        
        $this->render(
            'edit-comment.php',
            [
                'comment' => $comment,
                'message' => Null
            ],
            'Edit Comment'
        );

    }

    public function executeSubmitEditComment() {
        Flash::setFlash('alert', 'je suis une alerte');
        $commentManager = new CommentManager(PDOFactory::getMysqlConnection());

        $c = new Comment(["content"=>$_POST['comment-content'], "publishedDate"=>date("Y-m-d"), "authorId"=>$_POST['author-id'],  "id"=>$_POST['comment-id']]);
        $comment = $commentManager->updateComment($c);
        
        header('Location: /');
    }

    public function executeDeletePost() {
        Flash::setFlash('alert', 'je suis une alerte');
        $postManager = new PostManager(PDOFactory::getMysqlConnection());
        $post = $postManager->deletePostById($this->params['id']);

        header('Location: /user-post/');
    }

    public function executeDeleteComment() {
        Flash::setFlash('alert', 'je suis une alerte');
        $commentManager = new CommentManager(PDOFactory::getMysqlConnection());
        $comment = $commentManager->deleteCommentById($this->params['id']);

        header('Location: /');
    }


}