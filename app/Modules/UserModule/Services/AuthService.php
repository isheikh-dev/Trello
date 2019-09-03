<?php 

namespace UserModule\Services;

use UserModule\Http\Resources\AuthResource;
use UserModule\Repositories\AuthRepositoryInterface;


class AuthService
 {
    protected $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    } 

    public function register($data){ 
        $authUser = $this->authRepository->register($data);
        return new AuthResource($authUser);
    }

    public function login($data){ 
        $authUser = $this->authRepository->login($data);
        return new AuthResource($authUser);
    }
}