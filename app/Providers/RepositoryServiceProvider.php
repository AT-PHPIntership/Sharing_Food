<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Contracts\Repositories\UserRepository::class, \App\Repositories\Eloquent\UserRepositoryEloquent::class);
        $this->app->bind(\App\Contracts\Repositories\TypeRepository::class, \App\Repositories\Eloquent\TypeRepositoryEloquent::class);
        $this->app->bind(\App\Contracts\Repositories\RoleRepository::class, \App\Repositories\Eloquent\RoleRepositoryEloquent::class);
        $this->app->bind(\App\Contracts\Repositories\RatingRepository::class, \App\Repositories\Eloquent\RatingRepositoryEloquent::class);
        $this->app->bind(\App\Contracts\Repositories\PlaceRepository::class, \App\Repositories\Eloquent\PlaceRepositoryEloquent::class);
        $this->app->bind(\App\Contracts\Repositories\ImageRepository::class, \App\Repositories\Eloquent\ImageRepositoryEloquent::class);
        $this->app->bind(\App\Contracts\Repositories\FoodsStoreRepository::class, \App\Repositories\Eloquent\FoodsStoreRepositoryEloquent::class);
        $this->app->bind(\App\Contracts\Repositories\FoodRepository::class, \App\Repositories\Eloquent\FoodRepositoryEloquent::class);
        $this->app->bind(\App\Contracts\Repositories\CommentRepository::class, \App\Repositories\Eloquent\CommentRepositoryEloquent::class);
        //:end-bindings:
    }
}
