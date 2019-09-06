<?php 

namespace TaskModule\Repositories;

use TaskModule\Repositories\TaskRepositoryInterface;
use TaskModule\Task;

class TaskRepositoryEloquent implements TaskRepositoryInterface 
{

    protected $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }  
    public function index()
    {
        //  return auth()->user()->boards()->get();
    }
    public function show($id)
    {
        return $this->task->findOrFail($id);
    }
    public function delete($id)
    {
        return $this->task->findOrFail($id)->delete();
    }
    public function create($data)
    { 
        return $this->task->create($data);
    }
    public function update($request, $id)
    { 
         $task = $this->show($id);
         $task->update($request);
         return $task;
    }
}