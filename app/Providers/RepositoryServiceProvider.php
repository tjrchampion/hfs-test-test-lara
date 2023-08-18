<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Interface\ {
    UserRepositoryInterface,
    PostRepositoryInterface,
    CommentRepositoryInterface
};

use App\Repositories\Implementation\ {
    UserRepositoryImpl,
    PostRepositoryImpl,
    CommentRepositoryImpl
};

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepositoryImpl::class); 
        $this->app->bind(PostRepositoryInterface::class, PostRepositoryImpl::class); 
        $this->app->bind(CommentRepositoryInterface::class, CommentRepositoryImpl::class); 
    }
}
