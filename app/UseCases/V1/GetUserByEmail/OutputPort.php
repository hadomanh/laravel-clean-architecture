<?php

namespace App\UseCases\V1\GetUserByEmail;

interface OutputPort
{
    public function onUserReceived(ResponseModel $responseModel);
}
