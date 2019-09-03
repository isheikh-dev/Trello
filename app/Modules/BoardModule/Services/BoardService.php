<?php 

namespace BoardModule\Services;
use App\Repositories\BoardRepositoryInterface;


class BoardService {
    protected $boardRepository;

    public function __construct(BoardRepositoryInterface $boardRepository)
    {
        $this->boardRepository = $boardRepository;
    }


    public function show($id){
        return $this->boardRepository->show($id);
    }
}