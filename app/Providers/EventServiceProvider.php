<?php

namespace App\Providers;

use App\Listeners\UploadListener;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use UniSharp\LaravelFilemanager\Events\ImageWasDeleted;
use UniSharp\LaravelFilemanager\Events\ImageWasRenamed;
use UniSharp\LaravelFilemanager\Events\ImageWasUploaded;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ImageWasUploaded::class => [
            UploadListener::class,
        ],
        ImageWasDeleted::class => [
            UploadListener::class,
        ],
        ImageWasRenamed::class => [
            UploadListener::class,
        ],
    ];


    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
