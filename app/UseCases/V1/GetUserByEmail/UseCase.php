<?php

namespace App\UseCases\V1\GetUserByEmail;

use App\Repositories\UserRepository;

class UseCase implements InputPort
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function execute(RequestModel $requestModel, OutputPort $presenter) {
        $user = $this->userRepository->findByEmail($requestModel->getEmail());

        // TODO: Handle exception

        $presenter->onUserReceived(new ResponseModel($user['name']));
    }
}
