<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TaskPolicy
{

    public function index(User $user, Task $task): bool
    {
        return $user ;
    }

    public function create(User $user): bool
    {
        return $user->role == 'project-leader';
    }

    public function store(User $user): bool
    {
        return $user->role == 'project-leader';
    }

    public function edit(User $user, Task $task): bool
    {
        return $user->role == 'project-leader';
    }

    public function update(User $user, Task $task): bool
    {
        return $user->role == 'project-leader';
    }

    public function destroy(User $user, Task $task): bool
    {
        return $user->role == 'project-leader';
    }
}
