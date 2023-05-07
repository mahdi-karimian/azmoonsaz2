<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function store()
    {
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
