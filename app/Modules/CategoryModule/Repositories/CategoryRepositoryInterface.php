<?php 

namespace CategoryModule\Repositories;

interface CategoryRepositoryInterface {
    public function show($id);
    public function delete($id);
    public function create($data);
    public function index();
    public function update($request, $id);
}