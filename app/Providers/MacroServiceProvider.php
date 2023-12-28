<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Arr;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Response::macro('success', function (array $data = []) {
            return Response::json(array_merge($data, ['success' => true]), 200);
        });

        Response::macro('error', function (array $data) {
            $statusCode = Arr::get($data, 'statusCode', 400);
            unset($data['statusCode']);
            return Response::json(array_merge($data, ['success' => false]), $statusCode);
        });
    }
}
