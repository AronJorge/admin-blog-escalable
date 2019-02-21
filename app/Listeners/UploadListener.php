<?php

namespace App\Listeners;

use App\Imagenes;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use UniSharp\LaravelFilemanager\Events\FolderWasRenamed;
use UniSharp\LaravelFilemanager\Events\ImageWasDeleted;
use UniSharp\LaravelFilemanager\Events\ImageWasRenamed;
use UniSharp\LaravelFilemanager\Events\ImageWasUploaded;
use Zend\Diactoros\Request;

class UploadListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object $event
     * @return void
     */
    public function subscribe($events)
    {
        $events->listen('*', UploadListener::class);
    }

    public function handle($event)
    {
        $method = 'on' . class_basename($event);
        if (method_exists($this, $method)) {
            call_user_func([$this, $method], $event);
        }
    }

    public function onImageWasUploaded(ImageWasUploaded $event)
    {
        $path = $event->path();
        $ima = new Imagenes();
        $ima->url_imagen = $path;
        $ima->save();
    }

    public function onImageWasRenamed(ImageWasRenamed $event)
    {
        $oldPath = $event->oldPath();
        $newPath = $event->newPath();
        $ima = Imagenes::where('url_imagen', $oldPath)->get();
        $ima[0]->url_imagen = $newPath;
        $ima[0]->update();
    }

    public function onImageWasDeleted(ImageWasDeleted $event)
    {
        $path = $event->path();
        $ima = Imagenes::where('url_imagen', $path)->get();
        $ima[0]->delete();
    }

    public function onFolderWasRenamed(FolderWasRenamed $event)
    {
    }
}
