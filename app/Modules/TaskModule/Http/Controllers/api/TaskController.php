<?php

namespace TaskModule\Http\Controllers\api;

use App\Http\Controllers\Controller;
use TaskModule\Http\Requests\TaskCreateRequest;
use TaskModule\Services\TaskService;
 
class TaskController extends Controller
{
    protected $tasktService;

    public function __construct(TaskService $tasktService)
    {
        $this->tasktService = $tasktService;   
    }
 
    public function index()
    {
       return $this->tasktService->index();
    }  
 
    public function store(TaskCreateRequest $request)
    {
        return $this->tasktService->store($request);
    } 
 
    public function show($id)
    { 
         return  $this->tasktService->show($id);    
    } 
    
    public function update(TaskCreateRequest $request, $id)
    { 
         return $this->tasktService->update($request, $id);         
    } 
   
    public function destroy($id)
    {
          return $this->tasktService->delete($id);
    }
}
