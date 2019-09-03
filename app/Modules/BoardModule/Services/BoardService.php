<?php 

namespace BoardModule\Services;

use BoardModule\Http\Resources\BoardResource;
use BoardModule\Repositories\BoardRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BoardService {
    protected $boardRepository;

    public function __construct(BoardRepositoryInterface $boardRepository)
    {
        $this->boardRepository = $boardRepository;
    }


    public function show($id){  
        try{
            $board = $this->boardRepository->show($id);
            return new BoardResource($board);
         } catch (ModelNotFoundException $e) { 
             return response()->json(['error' => 'Model not Found']);
         }
    }
}