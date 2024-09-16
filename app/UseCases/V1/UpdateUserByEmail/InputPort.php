<?php

namespace App\UseCases\V1\UpdateUserByEmail;

interface InputPort
{
    public function execute(RequestModel $requestModel, OutputPort $presenter);
}
