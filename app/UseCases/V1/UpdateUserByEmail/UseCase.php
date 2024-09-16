<?php

namespace App\UseCases\V1\UpdateUserByEmail;

use App\Repositories\UserRepository;
use App\UseCases\V1\GetUserByEmail\InputPort as GetUserByEmailInputPort;
use App\UseCases\V1\GetUserByEmail\OutputPort as GetUserByEmailOutputPort;
use App\UseCases\V1\GetUserByEmail\RequestModel as GetUserByEmailRequestModel;
use App\UseCases\V1\GetUserByEmail\ResponseModel as GetUserByEmailResponseModel;

class UseCase implements InputPort, GetUserByEmailOutputPort
{
    private UserRepository $userRepository;
    private GetUserByEmailInputPort $getUserByEmailInteractor;
    private bool $userExists;

    public function __construct(UserRepository $userRepository, GetUserByEmailInputPort $getUserByEmailInteractor) {
        $this->userRepository = $userRepository;
        $this->getUserByEmailInteractor = $getUserByEmailInteractor;
        $this->userExists = false;
    }

    public function execute(RequestModel $requestModel, OutputPort $presenter) {
        $getUserByEmailRequestModel = new GetUserByEmailRequestModel($requestModel->getEmail());

        $this->getUserByEmailInteractor->execute($getUserByEmailRequestModel, $this);

        // TODO: Handle exception
        if ($this->userExists) {
            $this->userRepository->updateByEmail($requestModel->getEmail(), $requestModel->getName());
            $presenter->onUserUpdated(new ResponseModel());
        }
    }

    public function onUserReceived(GetUserByEmailResponseModel $responseModel) {
        $this->userExists = true;
    }
}
