<?php 

namespace BoardModule\Services;

use BoardModule\Http\Resources\BoardShowResource;
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
            return new BoardShowResource($board);
         } catch (ModelNotFoundException $e) { 
             return response()->json([
                                        'error' => 'Model not Found'
                                    ]);
         }
    }

    public function store($request){ 
        $board = $this->boardRepository->create($request->only('title'));
        return new BoardCreatedResource($board);

    }
}