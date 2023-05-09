<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\repositories\Contracts\UserRepositoryInterface;

class UsersController extends Controller
{
    public function __construct(private UserRepositoryInterface $userRepository)
    {

    }


    public function store()
    {
        //  $this->userRepository->create();

        return response()->json([
                'success' => true,
                'message' => 'کابر با موفقیت ایجاد شد ',
                'data' => [
                    'full_name' => 'mahdi karimian',
                    'email' => 'karimian@gmail.com',
                    'mobile' => '09129120912',
                    'password' => '123456',
                ],
            ]
        )->setStatusCode(201);
    }
}
