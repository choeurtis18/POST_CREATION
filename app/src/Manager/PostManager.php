<?php

namespace App\Manager;

use App\Entity\Post;

class PostManager extends BaseManager
{


    /**
     * @param int|null $number
     * @return array
     */
    public function getAllPosts(): array
    {
        
        $query = $this->db->prepare('SELECT * FROM `post`');
        $query->execute();

        while ($row = $query->fetch(\PDO::FETCH_ASSOC)) {
            $post = new Post($row);
            $posts[] = $post;
        };
        return $posts;
    }

    /**
     * @param int $id
     * @return Post
     */
    public function getPostById(int $id): Post
    {
        $query = $this->db->prepare('SELECT * FROM post WHERE id=:id');
        $query->bindValue(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE,'Entity\post');
        return $query->fetch();
    }


    /**
     * @param Post $post
     * @return Post|bool
     */
    public function createPost(Post $post)
    {

        $query = $this->db->prepare("INSERT INTO post (title,content, date, authorId,) VALUES (:title,:content ,:date ,:authorId)");
        $query ->bindValue(':title' , $post->getTitle());
        $query ->bindValue(':content' , $post->getContent());
        $query ->bindValue(':date',$post->getPublishedDate());
        $query ->bindValue(':authorId',$post->getAuthorId());
        $query->execute();

    }

    /**
     * @param Post $post
     * @return Post|bool A revoir
     */
    public function updatePost(int $id)
    {
        $query = $this->db->prepare("UPDATE post SET publishedDate = :publishedDate,
                                                      title = :title,
                                                      content = :content,
                                                      authorId= :authorId
                                                    WHERE id=:id");

        $query->execute();
    }

    /**
     * @param int $id
     * @return bool
     */
    public function deletePostById(int $id)
    {
        $query = $this->db->prepare('DELETE FROM post WHERE id=:id');
        $query->bindValue(':id', $id, \PDO::PARAM_INT);
        $query->execute();

    }
}