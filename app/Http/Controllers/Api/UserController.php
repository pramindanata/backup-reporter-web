<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    //
    public function destroy($id)
    {
        $user = $this->userService->getDetail($id);

        if (!$user) {
            abort(404);
        }

        $this->userService->delete($user);

        return response('ok');
    }
}
