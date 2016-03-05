<?php

namespace App\Repositories;

use App\User;
use App\Task;

class TaskRepository
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user, $status = null, $onlytoday=true)
    {
        $task = Task::ownedBy($user->id);
        if ($onlytoday) {
            $task = $task->today();
        }
        if ($status!=null) {
            $task = $task->where("status", $status);
        }
        return $task->orderBy('created_at', 'desc')
                    ->get();
    }




    public function howManyTodoForUserToday(User $user)
    {
        return Task::ownedBy($user->id)
                    ->today()
                    ->todo()
                    ->count();
    }
    public function howManyForUser(User $user, $status = Task::STATUS_TODO)
    {
        return Task::ownedBy($user->id)
                    ->where("status", $status)
                    ->count();
    }
}
