<?php 

namespace CategoryModule\Repositories;
use CategoryModule\Repositories\CategoryRepositoryInterface;
use CategoryModule\Category;

class CategoryepositoryEloquent implements CategoryRepositoryInterface 
{

    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }  
    public function index()
    {
        // return auth()->user()->boards()->get();
    }
    public function show($id)
    {
        return $this->category->findOrFail($id);
    }
    public function delete($id)
    {
        return $this->category->findOrFail($id)->delete();
    }
    public function create($data)
    { 
        return $this->category->create($data);
    }
    public function update($request, $id)
    { 
         $category = $this->show($id);
         $category->update($request);
         return $category;
    }
}