<?php 

namespace UserModule\Repositories;

interface AuthRepositoryInterface 
{
    public function create($data);
    public function login($data);
}