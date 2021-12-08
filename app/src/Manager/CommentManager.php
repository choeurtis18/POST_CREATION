<?php

namespace App\Manager;

use App\Entity\Comment;

class CommentManager extends BaseManager
{

    public function getAllComments(int $number=null): array
    {
        $query=$this->db->prepare('Select * FROM comment ');
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE,'Entity\comment');

        return $query->fetchAll();
    }

    /**
     * @param int $id
     * @return Comment
     */
    public function getCommentById(int $id): Comment
    {
        $query = $this->db->prepare('SELECT * FROM comment WHERE id=:id');
        $query->bindValue(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE,'Entity\comment');

        $com = new Comment($query->fetch());
        return $com;
    }

    /**
     * @param Comment $post
     * @return Comment|bool
     */
    public function createComm(Comment $comment) {
        $query = $this->db->prepare("INSERT INTO comment (title,content, date, authorId,) VALUES (:title,:content ,:date ,:authorId)");
        $query ->bindValue(':content' , $comment->getContent());
        $query ->bindValue(':date',$comment->getPublishedDate());
        $query ->bindValue(':authorId',$comment->getAuthorId());
        $query->execute();

    }





}
