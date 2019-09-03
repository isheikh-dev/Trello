<?php 

namespace UserModule\Repositories;
use UserModule\Repositories\BoardRepositoryInterface;
use UserModule\User;

class UserRepositoryEloquent implements BoardRepositoryInterface {

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }  

    public function show($id)
    {
        return $this->board->findOrFail($id);
    }
}