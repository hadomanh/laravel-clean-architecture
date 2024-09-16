<?php

namespace App\UseCases\V1\GetUserByEmail;

class RequestModel
{
    private string $email;

    public function __construct(string $email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }
}
