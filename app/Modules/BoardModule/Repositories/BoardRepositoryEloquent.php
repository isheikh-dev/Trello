<?php 

namespace BoardModule\Repositories;
use BoardModule\Repositories\BoardRepositoryInterface;
use BoardModule\Board;

class BoardRepositoryEloquent implements BoardRepositoryInterface {

    protected $board;

    public function __construct(Board $board)
    {
        $this->board = $board;
    }  

    public function show($id)
    {
        return $this->board->findOrFail($id);
    }
}