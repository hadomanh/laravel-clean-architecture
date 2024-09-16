<?php

namespace App\Repositories;

interface UserRepository
{
    public function findByEmail(string $email);

    public function updateByEmail(string $email, string $name);
}
