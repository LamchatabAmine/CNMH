<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    abstract public function getFieldData(): array;
    abstract public function model(): string;


    public function index(array $query = [], string $searchKey = 'name')
    {
        $queryBuilder = $this->model->query();
        // Apply additional query logic if provided
        foreach ($query as $column => $value) {
            if ($column === 'search') {
                // Handle search condition separately
                $queryBuilder->where($searchKey, 'like', '%' . $value . '%');
            } else {
                $queryBuilder->where($column, $value);
            }
        }
        return $queryBuilder->paginate(3);
    }


    public function store(array $validatedData)
    {
        $this->model->create($validatedData);
    }

    public function edit($task)
    {
        return $task;
    }

    public function update(array $validatedData, $task)
    {
        $task->update($validatedData);
        return $task;
    }

    public function destroy($task)
    {
        $task->delete();
    }
}
