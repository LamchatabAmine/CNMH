<?php

namespace App\Repositories;

use App\Models\Task;
use App\Repositories\BaseRepository;

class TasksRepository extends BaseRepository {

    // protected $task;

    protected $fillable = [
        'name',
        'description',
        'project_id'
    ];

    public function __construct(Task $task){
        $this->model = $task;
    }


    public function getFieldData():array {
        // return  $this->task->attributesToArray();
        return $this->fillable;
    }

    public function model(): string {
        return Task::class;
    }

}
