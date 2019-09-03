<?php 

namespace UserModule\Repositories;

use Illuminate\Support\Facades\Auth;
use UserModule\User;
use UserModule\Repositories\AuthRepositoryInterface;
use Illuminate\Support\Str;


class AuthRepositoryEloquent implements AuthRepositoryInterface {

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }  

    public function register($data)
    {
        $user =  $this->user->create(  $data->only('name','email', 'password')  );
        $user->api_token =  Str::random(60);
        $user->save();
        return $user;
    }

    public function login($data)
    {  
        if($token = Auth::guard('api')->attempt(['email' =>$data->email])){
            dd($token);
        }
    }
}