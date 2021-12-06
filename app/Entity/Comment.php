<?php

namespace App\Entity;

class Comment
{
    private int $id;
    private \DateTime $date;
    private string $content;
    private int $authorId;
    
}