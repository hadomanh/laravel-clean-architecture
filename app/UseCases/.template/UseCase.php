<?php

namespace App\UseCases\Template;

class UseCase implements InputPort
{
    public function execute(RequestModel $requestModel, OutputPort $presenter) {
        $presenter->handle(new ResponseModel());
    }
}
