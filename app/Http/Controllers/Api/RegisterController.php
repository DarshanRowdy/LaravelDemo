<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use DevDr\ApiCrudGenerator\Controllers\BaseApiController;
use Illuminate\Support\Facades\Auth;

class RegisterController extends BaseApiController
{
    public function register(RegisterRequest $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;

        return $this->_sendResponse($success, 'User register successfully.');
    }

    public function login(LoginRequest $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            $success['name'] =  $user->name;
            return $this->_sendResponse($success, 'User login successfully.');
        }
        else{
            return $this->_sendErrorResponse(401, 'Unauthorised');
        }
    }
}
