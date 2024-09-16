<?php

namespace App\UseCases\Template;

interface OutputPort
{
    public function handle(ResponseModel $responseModel);
}
