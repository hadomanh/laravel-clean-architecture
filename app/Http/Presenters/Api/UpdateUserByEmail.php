<?php

namespace App\Http\Presenters\Api;

use App\Http\Middleware\CleanArchitecture;
use App\UseCases\V1\UpdateUserByEmail\OutputPort;
use App\UseCases\V1\UpdateUserByEmail\ResponseModel;

class UpdateUserByEmail implements OutputPort
{
    private CleanArchitecture $middleware;

    public function __construct(CleanArchitecture $middleware) {
        $this->middleware = $middleware;
    }

    public function onUserUpdated(ResponseModel $responseModel) {
        $this->middleware->setResponse([]);
    }
}
