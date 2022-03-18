<?php

namespace App\Http\ViewComposers;

use App\Models\Admin;
use Illuminate\View\View;


class AdminnameComposer
{
    /**
     * The user repository implementation.
     *
     * @var \App\Repositories\UserRepository
     */
    protected $adminname;

    /**
     * Create a new profile composer.
     *
     * @param  
     * @return void
     */
    public function __construct()
    {
        // Dependencies are automatically resolved by the service container...

        $this->adminname = Admin::select('firstname','lastname')->where('id', '=', session('loggedUser'))->first();
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('adminname', $this->adminname);
    }
} 

 