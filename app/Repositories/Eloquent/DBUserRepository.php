<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\UserRepository;

class DBUserRepository implements UserRepository
{
    protected User $model;

    public function __construct(User $model) {
        $this->model = $model;
    }

    public function findByEmail(string $email) {
        return $this->model->firstWhere('email', $email);
    }

    public function updateByEmail(string $email, string $name) {
        $this->model->firstWhere('email', $email)->update(compact('name'));
    }
}
