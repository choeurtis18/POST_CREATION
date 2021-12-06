<?php

namespace App\Entity;

abstract class User
{
    private int $id;
    private string $name;
    private string $lastName;
    private string $mail;
    private string $password;
    private bool $isAdmin;
}