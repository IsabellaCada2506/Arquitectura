<?php

namespace App\Providers;

use App\Interfaces\ImageStorage;
use App\Utils\ImageLocalStorage;
use Illuminate\Support\ServiceProvider;

class ImageServiceProvider extends ServiceProvider
{
    // Dictatorship 3: Strict typing (void)
    public function register(): void
    {
        $this->app->bind(ImageStorage::class, function () {
            return new ImageLocalStorage;
        });
    }
}
