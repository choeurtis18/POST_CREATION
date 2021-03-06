<?php

namespace App\Entity;

use App\Fram\Factories\PDOFactory;
use App\Manager\UserManager;

class Comment
{
    private int $id;
    private \DateTime $publishedDate;
    private string $content;
    private int $authorId;
    private int $postId;

    function __construct($data){
        $this->hydrate($data);
    }


    public function hydrate($data){
        foreach ($data as $key => $value) {
                $method = 'set'.ucfirst($key);
                if (is_callable([$this, $method])) {
                        $this->$method($value);
                }
        }      
    }
    
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return \DateTime
     */
    public function getPublishedDate(): \DateTime
    {
        return $this->publishedDate;
    }

    /**
     * @param string $publishedDate
     */
    public function setPublishedDate(string $publishedDatee): void
    {
        $this->publishedDate = \DateTime::createFromFormat('Y-m-d', $publishedDatee);
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return int
     */
    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    /**
     * @param int $authorId
     */
    public function setAuthorId(int $authorId): void
    {
        $this->authorId = $authorId;
    }


    /**
     * Get the value of postId
     */ 
    public function getPostId()
    {
        return $this->postId;
    }

    /**
     * Set the value of postId
     *
     * @return  self
     */ 
    public function setPostId($postId)
    {
        $this->postId = $postId;

        return $this;
    }

    /**
     * @param int $id
     * @return Author|Null|bool
     */
    public function getCommentAuthor(int $id)
    {
        $userManager = new UserManager(PDOFactory::getMysqlConnection());
        $author = $userManager->getUserById($id);

        return $author;
    }
}