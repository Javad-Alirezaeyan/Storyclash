<?php

namespace App\Providers;

use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\ServiceProvider;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(ResponseFactory $factory)
    {
        $factory->macro('success', function ($data = null, $message = '') use ($factory) {
            $format = [
                'status' => 'ok',
                'message' => $message,
                'data' => $data,
            ];

            return $factory->make($format);
        });

        $factory->macro('error', function ( $errors = [], string $message = '') use ($factory){
            $format = [
                'status' => 'error',
                'message' => $message,
                'errors' => $errors,
            ];

            return $factory->make($format);
        });
    }
}
