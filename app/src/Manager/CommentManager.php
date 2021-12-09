<?php

namespace App\Manager;

use App\Entity\Comment;

class CommentManager extends BaseManager
{
    /**
     * @return Comment[]|NULL|bool
     */
    public function getAllComments()
    {
        try {
            $query = $this->db->prepare('SELECT * FROM `comment`');
            $query->execute();
    
            while ($row = $query->fetch(\PDO::FETCH_ASSOC)) {
                $comment = new Comment($row);
                $comments[] = $comment;
            };
            return $comments;
        } catch (\Exception $e) {
            die('Erreur : '.$e->getMessage());
            return "error getAllComments function in CommentManager.php";
        } 
    }

    /**
     * @return Comment[]|NULL|bool
     */
    public function getAllCommentsByPostId(int $id)
    {
        try {
            $query = $this->db->prepare('SELECT * FROM `comment` WHERE postId=:id');
            $query->bindValue(':id', $id, \PDO::PARAM_INT);
            $query->execute();
    
            while ($row = $query->fetch(\PDO::FETCH_ASSOC)) {
                $comment = new Comment($row);
                $comments[] = $comment;
            };
            return $comments;
        } catch (\Exception $e) {
            var_dump("TA GRAND MERE");
            die('Erreur : '.$e->getMessage());
            return "error getAllComments function in CommentManager.php";
        } 
    }
    /**
     * @param int $id
     * @return Comment|NULL|bool
     */
    public function getCommentById(int $id)
    {
        try {
            $req = $this->db->prepare('SELECT * FROM comment WHERE id=:id');
            $req->bindValue(':id', $id, \PDO::PARAM_INT);

            $req->execute();
            $row = $req->fetch(\PDO::FETCH_ASSOC);
            $comment = new Comment($row);
            return $comment;
        } catch (\Exception $e) {
            die('Erreur : '.$e->getMessage());
            return "error getCommentById function in CommentManager.php";
        }
    }

    /**
     * @param Comment $comment
     * @return Comment|NULL|bool
     */
    public function createComment(Comment $comment) 
    {
        try {
            $query = $this->db->prepare("INSERT INTO `comment` (`id`, `publishedDate`, `content`, `authorId`, `postId`) VALUES (NULL, :publishedDate ,:content ,:authorId, :postId)");
            $query ->bindValue(':content' , $comment->getContent(), \PDO::PARAM_STR);
            $query ->bindValue(':publishedDate',$comment->getPublishedDate()->format('Y-m-d'), \PDO::PARAM_STR);
            $query ->bindValue(':authorId',$comment->getAuthorId(), \PDO::PARAM_INT);
            $query ->bindValue(':postId',$comment->getPostId(), \PDO::PARAM_INT);
            $query->execute();
        } catch (\Exception $e) {
            die('Erreur : '.$e->getMessage());
            return "error createComment function in CommentManager.php";
        } 
    }

/**
     * @param Comment $comment
     * @return Comment|NULL|bool
     */
    public function updateComment(Comment $comment)
    {
        try {
            $query = $this->db->prepare("UPDATE `Comment`  SET `content` = :content,
                                                        `publishedDate` = :publishedDate,
                                                        `authorId` = :authorId, `postId` = :postId
                                                    WHERE `id` = :id");
        
            $query->bindValue(':publishedDate', $comment->getPublishedDate()->format('Y-m-d'), \PDO::PARAM_STR);
            $query->bindValue(':content', $comment->getContent(), \PDO::PARAM_STR);
            $query->bindValue(':authorId', $comment->getAuthorId(), \PDO::PARAM_INT);
            $query ->bindValue(':postId',$comment->getPostId(), \PDO::PARAM_INT);
            $query->bindValue(':id', $comment->getId(), \PDO::PARAM_INT);
            $query->execute();
        } catch (\Exception $e) {
            die('Erreur : '.$e->getMessage());
            return "error deleteCommentById function in CommentManager.php";
        }
    }

    /**
     * @param int $id
     * @return bool
     */
    public function deleteCommentById(int $id)
    {
        try {
            $req = $this->db->prepare('DELETE FROM Comment WHERE id=:ID');
            $req->bindValue(':ID', $id, \PDO::PARAM_INT);

            $req->execute();
        } catch (\Exception $e) {
            die('Erreur : '.$e->getMessage());
            return "error deleteCommentById function in CommentManager.php";
        }  
    }



}
