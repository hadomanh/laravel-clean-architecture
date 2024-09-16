<?php

namespace App\Http\Controllers;

use App\UseCases\V1\GetUserByEmail\InputPort as GetUserByEmailInputPort;
use App\UseCases\V1\GetUserByEmail\OutputPort as GetUserByEmailOutputPort;
use App\UseCases\V1\GetUserByEmail\RequestModel as GetUserByEmailRequestModel;
use App\UseCases\V1\UpdateUserByEmail\InputPort as UpdateUserByEmailInputPort;
use App\UseCases\V1\UpdateUserByEmail\OutputPort as UpdateUserByEmailOutputPort;
use App\UseCases\V1\UpdateUserByEmail\RequestModel as UpdateUserByEmailRequestModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected GetUserByEmailInputPort $getUserByEmailInteractor;
    protected GetUserByEmailOutputPort $getUserByEmailPresenter;

    protected UpdateUserByEmailInputPort $updateUserByEmailInteractor;
    protected UpdateUserByEmailOutputPort $updateUserByEmailPresenter; 

    public function __construct(
        GetUserByEmailInputPort $getUserByEmailInteractor,
        GetUserByEmailOutputPort $getUserByEmailPresenter,

        UpdateUserByEmailInputPort $updateUserByEmailInteractor,
        UpdateUserByEmailOutputPort $updateUserByEmailPresenter
    ) {
        $this->getUserByEmailInteractor = $getUserByEmailInteractor;
        $this->getUserByEmailPresenter = $getUserByEmailPresenter;
        
        $this->updateUserByEmailInteractor = $updateUserByEmailInteractor;
        $this->updateUserByEmailPresenter = $updateUserByEmailPresenter;
    }

    public function getByEmail(Request $request) {
        $email = $request->input('email', '');

        $requestModel = new GetUserByEmailRequestModel($email);

        $this->getUserByEmailInteractor->execute($requestModel, $this->getUserByEmailPresenter);
    }

    public function updateByEmail(Request $request) {
        $email = $request->input('email', '');
        $name = $request->input('name', '');

        $requestModel = new UpdateUserByEmailRequestModel($email, $name);

        $this->updateUserByEmailInteractor->execute($requestModel, $this->updateUserByEmailPresenter);
    }
}
