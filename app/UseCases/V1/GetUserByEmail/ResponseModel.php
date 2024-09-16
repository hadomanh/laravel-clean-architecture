<?php

namespace App\UseCases\V1\GetUserByEmail;

class ResponseModel
{
    private string $name;

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
}
