<?php

namespace BoardModule\Http\Controllers\api;

use App\Http\Controllers\Controller;
use BoardModule\Http\Requests\BoardCreateRequest;
use BoardModule\Services\BoardService;
use Illuminate\Support\Facades\Request;

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

    
    public function update(BoardCreateRequest $request, $id)
    { 
         return $this->boardService->update($request, $id);         
    }

   
    public function destroy($id)
    {
          $this->boardService->delete($id);
    }
}
