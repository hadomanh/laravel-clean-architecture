<?php

namespace App\UseCases\Template;

interface InputPort
{
    public function execute(RequestModel $requestModel, OutputPort $presenter);
}
