<?php 

namespace BoardModule\Repositories;

interface BoardRepositoryInterface {
    public function show($id);
    public function create($data);
}