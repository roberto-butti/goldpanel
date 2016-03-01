<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
//use Illuminate\Users\Repository as UserRepository;
use App\Repositories\TaskRepository as TaskRepository;
use Illuminate\Http\Request;

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
        $count=  $this->tasks->howManyForUser($this->request->user());
        $view->with('count', $count);
    }
}