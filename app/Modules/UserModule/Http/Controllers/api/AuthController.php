<?php

namespace UserModule\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use UserModule\Http\Requests\AuthRegisterRequest;
use UserModule\Http\Requests\AuthLoginRequest;
use UserModule\Services\AuthService;


class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;   
    }

    public function register(AuthRegisterRequest $validRequest){   
        return  $this->authService->register($validRequest);
    }
 
    // Passport Login  Oauth2
    public function login(AuthLoginRequest $request){  
        $response = $this->authService->login($request);
        return $response;
    }

    public function logout(){
        return $this->authService->logout();
    }

}