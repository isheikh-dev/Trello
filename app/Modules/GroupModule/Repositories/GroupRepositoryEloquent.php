<?php 

namespace GroupModule\Repositories;

use GroupModule\Repositories\GroupRepositoryInterface;
use GroupModule\Group;

class GroupRepositoryEloquent implements GroupRepositoryInterface 
{

    protected $group;

    public function __construct(Group $group)
    {
        $this->group = $group;
    }  
    public function index()
    {
        //  return auth()->user()->boards()->get();
    }
    public function show($id)
    {
        return $this->group->findOrFail($id);
    }
    public function delete($id)
    {
        return $this->group->findOrFail($id)->delete();
    }
    public function create($data)
    { 
        return $this->group->create($data);
    }
    public function update($request, $id)
    { 
         $group = $this->show($id);
         $group->update($request);
         return $group;
    }
}