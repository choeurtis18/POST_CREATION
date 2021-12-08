<?php

namespace App\Entity;

class Post
{
    private int $id;
    private \DateTime $publishedDate;
    private string $title;
    private string $content;
    private int $authorId;

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
        $this->publishedDate = new \DateTime($publishedDatee);
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
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



}