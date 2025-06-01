<?php

namespace App\Providers;

use App\Events\ContactFormEvent;
use App\Listeners\ContactFormListener;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Registering event
        Event::listen(
            ContactFormEvent::class,
            ContactFormListener::class,
        );
    }
}
