<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
//use Illuminate\Users\Repository as UserRepository;
use App\Repositories\TaskRepository as TaskRepository;
use Illuminate\Http\Request;
use App\Task;

class CommonHeaderComposer
{
    /**
     * The user repository implementation.
     *
     * @var TaskRepository
     */
    protected $tasks;
    protected $request;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(TaskRepository $tasks, Request $request)
    {
        $this->request = $request;
        $this->tasks = $tasks;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if ($this->request->user()) {
            $count_todo_today=  $this->tasks->howManyTodoForUserToday($this->request->user());
            $count_todo=  $this->tasks->howManyForUser($this->request->user(), Task::STATUS_TODO);
            $tasks = $this->tasks->forUser($this->request->user(), Task::STATUS_TODO, true);
        } else {
            $count_todo_today=0;
            $count_todo=0;
            $tasks = null;
        }

        $view->with('count_todo_today', $count_todo_today);
        $view->with('count_todo', $count_todo);
        $view->with('tasks', $tasks);
    }
}