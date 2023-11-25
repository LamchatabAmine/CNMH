<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository {
    protected $model ;

    public function __construct(Model $model){
        $this->model = $model;
    }

    abstract public function getFieldData():array;
    abstract public function model():string;


    public function index(array $query = []) {
        $queryBuilder = $this->model->query();
        // Apply additional query logic if provided
        foreach ($query as $column => $value) {
            if ($column === 'search') {
                // Handle search condition separately
                $queryBuilder->where('name', 'like', '%' . $value . '%');
            } else {
                $queryBuilder->where($column, $value);
            }
        }
        return $queryBuilder->paginate(3);
    }


    public function store(array $validatedData){
        $this->model->create($validatedData);
    }

    public function edit($task){
        // $task = $this->model->findOrFail($task);
        return $task;
    }

    public function update(array $validatedData , $task){
        // $task = $this->model->findOrFail($id);
        $task->update($validatedData);
        return $task;
    }

    public function destroy($task){
        // $task = $this->model->findOrFail($id);
        $task->delete();
    }
}
