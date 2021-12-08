<?php

namespace App\Entity;

class Standard extends User
{
    function __construct($data){
        $this->hydrate($data);
    }
}