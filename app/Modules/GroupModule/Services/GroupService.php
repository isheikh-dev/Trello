<?php 

namespace GroupModule\Services;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use GroupModule\Http\Resources\GroupCollectionShowResource;
use GroupModule\Http\Resources\GroupCreatedResource;
use GroupModule\Http\Resources\GroupShowResource;
use GroupModule\Repositories\GroupRepositoryInterface; 

class GroupService {

    protected $groupRepository;

    public function __construct(GroupRepositoryInterface $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    } 

    public function index(){
        $categories = $this->groupRepository->index();
        return new GroupCollectionShowResource($categories); 
    }

    public function show($id){   
        try{
            $Group = $this->groupRepository->show($id);
            return new GroupShowResource($Group);
         } catch (ModelNotFoundException $e) { 
             return response()->json([
                                        'error' => 'Model not Found'
                                    ]);
         }
    } 
    
    public function store($request){ 
        $Group = $this->groupRepository->create($request->only('title'));
        return new GroupCreatedResource($Group); 
    }

    public function delete($id){ 
        try{
            $this->groupRepository->delete($id);
            return response()->json([
                                    'Message'       => 'Group Deleted Successfully' , 
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
            $updatedGroup = $this->groupRepository->update($request->only('title') ,$id);
            return new GroupShowResource($updatedGroup);
         } catch (ModelNotFoundException $e) { 
             return response()->json([
                                        'error' => 'Model not Found'
                                    ]);
         }
    }
}