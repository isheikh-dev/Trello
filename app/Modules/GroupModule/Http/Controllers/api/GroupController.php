<?php

namespace GroupModule\Http\Controllers\api;

use App\Http\Controllers\Controller;
use GroupModule\Http\Requests\GroupCreateRequest;
use GroupModule\Services\GroupService;
 
class GroupController extends Controller
{
    protected $grouptService;

    public function __construct(GroupService $grouptService)
    {
        $this->grouptService = $grouptService;   
    }
 
    public function index()
    {
       return $this->grouptService->index();
    }  
 
    public function store(GroupCreateRequest $request)
    {
        return $this->grouptService->store($request);
    } 
 
    public function show($id)
    { 
         return  $this->grouptService->show($id);    
    } 
    
    public function update(GroupCreateRequest $request, $id)
    { 
         return $this->grouptService->update($request, $id);         
    } 
   
    public function destroy($id)
    {
          return $this->grouptService->delete($id);
    }
}
