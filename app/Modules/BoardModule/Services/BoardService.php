<?php 

namespace BoardModule\Services;

use BoardModule\Http\Resources\BoardResource;
use BoardModule\Repositories\BoardRepositoryInterface;


class BoardService {
    protected $boardRepository;

    public function __construct(BoardRepositoryInterface $boardRepository)
    {
        $this->boardRepository = $boardRepository;
    }


    public function show($id){
        // dd(1);
        $board = $this->boardRepository->show($id);
        return new BoardResource($board);
    }
}