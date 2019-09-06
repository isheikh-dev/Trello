<?php 

namespace TaskModule\Services;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use TaskModule\Http\Resources\TaskCollectionShowResource;
use TaskModule\Http\Resources\TaskCreatedResource;
use TaskModule\Http\Resources\TaskShowResource;
use TaskModule\Repositories\TaskRepositoryInterface; 

class TaskService {

    protected $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    } 

    public function index(){
        $categories = $this->taskRepository->index();
        return new TaskCollectionShowResource($categories); 
    }

    public function show($id){   
        try{
            $task = $this->taskRepository->show($id);
            return new TaskShowResource($task);
         } catch (ModelNotFoundException $e) { 
             return response()->json([
                                        'error' => 'Model not Found'
                                    ]);
         }
    } 
    
    public function store($request){ 
        $task = $this->taskRepository->create($request->only('title'));
        return new TaskCreatedResource($task); 
    }

    public function delete($id){ 
        try{
            $this->taskRepository->delete($id);
            return response()->json([
                                    'Message'       => 'task Deleted Successfully' , 
                                    'status'     => 'Success',
                                    'statusCode' => 200
                                ]);
        } catch (ModelNotFoundException $e) { 
            return response()->json([
                                        'error' => 'Model not Found'
                                    ]);
        } 
    }

    public function update($request, $id){    
        try{ 
            $updatedTask = $this->taskRepository->update($request->only('title') ,$id);
            return new TaskShowResource($updatedTask);
         } catch (ModelNotFoundException $e) { 
             return response()->json([
                                        'error' => 'Model not Found'
                                    ]);
         }
    }
}