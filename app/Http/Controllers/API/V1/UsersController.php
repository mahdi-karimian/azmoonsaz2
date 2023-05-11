<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\API\contracts\APIController;
use App\repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;
use function Monolog\toArray;

class UsersController extends APIController
{
    public function __construct(private UserRepositoryInterface $userRepository)
    {

    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required|string|min:3|max:255',
            'email' => 'required|email',
            'mobile' => 'required|string|digits:11',
            'password' => 'required|string',
        ]);
        $this->userRepository->create([
            'full_name' => $request->fullname,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => app('hash')->make($request->password),
        ]);
        return $this->respondCreated('کاربر با موفقیت ایجاد شد  ', [
            'full_name' => $request->fullname,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => $request->password,
        ]);

    }
}
