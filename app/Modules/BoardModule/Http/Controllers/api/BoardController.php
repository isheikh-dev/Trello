<?php

namespace BoardModule\Http\Controllers\api;

use BoardModule\Board;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use BoardModule\Http\Requests\BoardCreateRequest;
use BoardModule\Services\BoardService;
 
class BoardController extends Controller
{
    protected $boardService;

    public function __construct(BoardService $boardService)
    {
        $this->boardService = $boardService;   
    }
 
    public function index()
    {
       return $this->boardService->index();
    } 

 
    public function store(BoardCreateRequest $request)
    {
        return $this->boardService->store($request);
    }

 
    public function show($id)
    { 
         return  $this->boardService->show($id);    
    }

 
    public function update(Request $request, Board $board)
    {
        //
    }

   
    public function destroy(Board $board)
    {
        //
    }
}
