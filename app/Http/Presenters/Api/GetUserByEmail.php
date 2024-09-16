<?php

namespace App\Http\Presenters\Api;

use App\Http\Middleware\CleanArchitecture;
use App\UseCases\V1\GetUserByEmail\OutputPort;
use App\UseCases\V1\GetUserByEmail\ResponseModel;

class GetUserByEmail implements OutputPort
{
    private CleanArchitecture $middleware;

    public function __construct(CleanArchitecture $middleware) {
        $this->middleware = $middleware;
    }

    public function onUserReceived(ResponseModel $responseModel) {
        $this->middleware->setResponse([
            'name' => $responseModel->getName(),
        ]);
    }
}
