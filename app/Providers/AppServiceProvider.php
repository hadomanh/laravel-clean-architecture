<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $models = [
            'User',
        ];

        $useCases = [
            'UpdateUserByEmail',
            'GetUserByEmail',
        ];

        $apiPresenters = [
            'UpdateUserByEmail',
            'GetUserByEmail',
        ];

        foreach ($models as $model) {
            app()->bind(
                'App\Repositories\\' . $model . 'Repository',
                'App\Repositories\Eloquent\DB' . $model . 'Repository'
            );
        }

        foreach ($useCases as $useCase) {
            app()->bind(
                'App\UseCases\V1\\' . $useCase . '\\InputPort',
                'App\UseCases\V1\\' . $useCase . '\\UseCase'
            );
        }

        foreach ($apiPresenters as $presenter) {
            app()->bind(
                'App\UseCases\V1\\' . $presenter . '\\OutputPort',
                'App\Http\Presenters\Api\\' . $presenter,
            );
        }

        app()->singleton("App\Http\Middleware\CleanArchitecture");
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
