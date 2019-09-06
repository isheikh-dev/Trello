<?php

namespace CategoryModule\Http\Controllers\api;

use App\Http\Controllers\Controller;
use CategoryModule\Http\Requests\CategoryCreateRequest;
use CategoryModule\Services\CategorytService;
use Illuminate\Support\Facades\Request;

class CategoryController extends Controller
{
    protected $categorytService;

    public function __construct(CategorytService $categorytService)
    {
        $this->categorytService = $categorytService;   
    }
 
    public function index()
    {
       return $this->categorytService->index();
    } 

 
    public function store(CategoryCreateRequest $request)
    {
        return $this->categorytService->store($request);
    }

 
    public function show($id)
    { 
         return  $this->categorytService->show($id);    
    }

    
    public function update(CategoryCreateRequest $request, $id)
    { 
         return $this->categorytService->update($request, $id);         
    }

   
    public function destroy($id)
    {
          $this->categorytService->delete($id);
    }
}
