<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
//use Illuminate\Users\Repository as UserRepository;

class CommonHeaderComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $users;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    //public function __construct(UserRepository $users)
    public function __construct()
    {
        // Dependencies automatically resolved by service container...

    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('count', 5);
    }
}