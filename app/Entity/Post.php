<?php

namespace App\Entity;

class Post
{
    private int $id;
    private \DateTime $publishedDate;
    private string $title;
    private string $content;
    private int $authorId;

}