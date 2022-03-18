<?php

namespace App\Http\ViewComposers;

use App\Models\Category;
use Illuminate\View\View;


class CategoryComposer
{
    /**
     * The user repository implementation.
     *
     * @var \App\Repositories\UserRepository
     */
    protected $categorys;

    /**
     * Create a new profile composer.
     *
     * @param  
     * @return void
     */
    public function __construct()
    {
        // Dependencies are automatically resolved by the service container...
        $this->categorys = Category::all();
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('categorys', $this->categorys);
    }
} 

 