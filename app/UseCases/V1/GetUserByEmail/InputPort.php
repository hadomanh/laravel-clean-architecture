<?php

namespace App\UseCases\V1\GetUserByEmail;

interface InputPort
{
    public function execute(RequestModel $requestModel, OutputPort $presenter);
}
