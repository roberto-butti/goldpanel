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
    //public function __construct(UserRepository $users)
    public function __construct(TaskRepository $tasks, Request $request)
    {
        // Dependencies automatically resolved by service container...
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
        //$viewdata= $view->getData();
        //echo count($viewdata);
        //dd(Auth::user());
        //echo get_class($this->request->user());
        $count=  $this->tasks->howManyForUser($this->request->user());
        //$count=1;
        //echo get_class($this->request->getUser());
        //echo $viewdata["app"]->getRequest();
        //$viewdata['id'];
        //print_r($viewdata);
        $view->with('count', $count);
    }
}