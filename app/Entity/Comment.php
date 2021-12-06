<?php

namespace App\Entity;

class Comment
{
    private int $id;
    private \DateTime $publishedDate;
    private string $content;
    private int $authorId;
    
}