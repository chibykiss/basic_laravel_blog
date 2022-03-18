<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //gate to protect updating comments
        Gate::define('update-comment', function(User $user, Comment $comment){
            return $user->id === $comment->user_id;
        });
        //gate for protect deleting comments
        Gate::define('delete-comment', function(User $user, Comment $comment){
            return $user->id === $comment->user_id;
        });
    }
}
