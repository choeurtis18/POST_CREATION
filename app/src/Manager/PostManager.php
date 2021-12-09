<?php

namespace App\Manager;

use App\Entity\Post;
use App\Controller\ErrorController;
use PDO;

class PostManager extends BaseManager
{


    /**
     * @return array|NULL|bool
     */
    public function getAllPosts()
    {
        try {
            $query = $this->db->prepare('SELECT * FROM `post`');
            $query->execute();
    
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $post = new Post($row);
                $posts[] = $post;
            };
            return $posts;
        } catch (\Exception $e) {
            die('Erreur : '.$e->getMessage());
            return "error getAllPosts function in PostManager.php";
        } 
    }

    /**
     * @param int $id
     * @return Post|NULL|bool
     */
    public function getPostById(int $id)
    {
        try {
            $req = $this->db->prepare('SELECT * FROM post WHERE id=:id');
            $req->bindValue(':id', $id, PDO::PARAM_INT);

            $req->execute();
            $row = $req->fetch(PDO::FETCH_ASSOC);

            if($row == true){
                $post = new Post($row);
                return $post;
            }else {
                return new ErrorController('error404');
            }
        } catch (\Exception $e) {
            die('Erreur : '.$e->getMessage());
            return "error getPostById function in PostManager.php";
        } 
    }


    /**
     * @param Post $post
     * @return Post|bool|null
     */
    public function createPost(Post $post)
    {
        try {
            $query = $this->db->prepare("INSERT INTO `post` (`id`, `publishedDate`, `title`, `content`, `authorId`) VALUES (NULL, :publishedDate ,:title, :content ,:authorId)");
            $query ->bindValue(':title' , $post->getTitle(), PDO::PARAM_STR);
            $query ->bindValue(':content' , $post->getContent(), PDO::PARAM_STR);
            $query ->bindValue(':publishedDate',$post->getPublishedDate()->format('Y-m-d'), PDO::PARAM_STR);
            $query ->bindValue(':authorId',$post->getAuthorId(), PDO::PARAM_INT);
            $query->execute();
        } catch (\Exception $e) {
            die('Erreur : '.$e->getMessage());
            return "error createPost function in PostManager.php";
        }  
    }

    /**
     * @param Post $post
     * @return Post|bool|null
     */
    public function updatePost(Post $post)
    {
        try {
            $query = $this->db->prepare("UPDATE `post`  SET `title` = :title,
                                                        `content` = :content,
                                                        `publishedDate` = :publishedDate,
                                                        `authorId` = :authorId
                                                    WHERE `id` = :id");
        
            $query->bindValue(':title', $post->getTitle(), PDO::PARAM_STR);
            $query->bindValue(':publishedDate', $post->getPublishedDate()->format('Y-m-d'), PDO::PARAM_STR);
            $query->bindValue(':content', $post->getContent(), PDO::PARAM_STR);
            $query->bindValue(':authorId', $post->getAuthorId(), PDO::PARAM_INT);
            $query->bindValue(':id', $post->getId(), PDO::PARAM_INT);
            $query->execute();
        } catch (\Exception $e) {
            die('Erreur : '.$e->getMessage());
            return "error updatePost function in PostManager.php";
        }
    }

    /**
     * @param int $id
     * @return bool
     */
    public function deletePostById(int $id)
    {
        try {
            $req = $this->db->prepare('DELETE FROM post WHERE id=:id');
            $req->bindValue(':id', $id, PDO::PARAM_INT);

            $req->execute();
            return true;
        } catch (\Exception $e) {
            die('Erreur : '.$e->getMessage());
            return "error deletePostById function in PostManager.php";
        }  
    }
}