<?php

namespace App\UseCases\V1\UpdateUserByEmail;

interface OutputPort
{
    public function onUserUpdated(ResponseModel $responseModel);
}
