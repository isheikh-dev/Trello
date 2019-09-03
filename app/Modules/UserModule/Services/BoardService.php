<?php 

namespace UserModule\Services;

 use UserModule\Repositories\UserRepositoryInterface;


class UserService {
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function show($id){
        // dd(1);
        $board = $this->userRepository->show($id);
        return new BoardResource($board);
    }
}