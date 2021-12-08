<?php

namespace App\Entity;
use App\Entity;

class Admin extends User
{
  function __construct($data){
    $this->hydrate($data);
}

}

