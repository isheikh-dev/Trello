<?php

namespace UserModule\Http\Controllers\api;

use App\Http\Controllers\Controller;
use UserModule\Http\Requests\AuthCreateRequest;
use UserModule\Http\Requests\AuthLoginRequest;
use UserModule\Services\AuthService;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;   
    }

    public function register(AuthCreateRequest $validRequest){  
        return  $this->authService->register($validRequest);
    }

    public function login(AuthLoginRequest $validRequest){  
        return  $this->authService->login($validRequest);
    }

}