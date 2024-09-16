<?php

namespace App\UseCases\V1\UpdateUserByEmail;

class RequestModel
{
    private string $name;
    private string $email;

    public function __construct(string $email, string $name) {
        $this->email = $email;
        $this->name = $name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getName() {
        return $this->name;
    }
}
