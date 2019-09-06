<?php 

namespace CategoryModule\Services;

use CategoryModule\Http\Resources\CategoryCreatedResource;
use CategoryModule\Http\Resources\CategoryShowResource;
use CategoryModule\Repositories\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use CategoryModule\Http\Resources\CategoryCollectionShowResource;
 
class CategoryService {
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    } 

    public function index(){
        $categories = $this->categoryRepository->index();
        return new CategoryCollectionShowResource($categories); 
    }

    public function show($id){   
        try{
            $category = $this->categoryRepository->show($id);
            return new CategoryShowResource($category);
         } catch (ModelNotFoundException $e) { 
             return response()->json([
                                        'error' => 'Model not Found'
                                    ]);
         }
    } 
    
    public function store($request){ 
        $category = $this->categoryRepository->create($request->only('title'));
        auth()->user()->boards()->save($category);
        return new CategoryCreatedResource($category); 
    }

    public function delete($id){ 
        try{
            $this->categoryRepository->delete($id);
            return response()->json( [
                                    'Message'       => 'list Deleted Successfully' , 
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
            $updatedCategory = $this->categoryRepository->update($request->only('title') ,$id);
            return new CategoryShowResource($updatedCategory);
         } catch (ModelNotFoundException $e) { 
             return response()->json([
                                        'error' => 'Model not Found'
                                    ]);
         }
    }
}