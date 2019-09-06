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
    public function index()
    {
        return auth()->user()->boards()->get();
    }
    public function show($id)
    {
        return $this->board->findOrFail($id);
    }
    public function delete($id)
    {
        return $this->board->findOrFail($id)->delete();
    }
    public function create($data)
    { 
        return $this->board->create($data);
    }
    public function update($request, $id)
    { 
         $board = $this->show($id);
         $board->update($request);
         return $board;
    }
}