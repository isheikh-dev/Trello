<?php 

namespace UserModule\Repositories;

interface AuthRepositoryInterface 
{
    public function register($data);
    public function login($data);
}