<?php
namespace FinerThings\Core\Providers;

use Adamgoose\AnnotationsServiceProvider as ServiceProvider;
use FinerThings\Http\Controllers\ArticleController;
use FinerThings\Http\Controllers\HomeController;

class AnnotationsServiceProvider extends ServiceProvider
{
    /**
     * The classes to scan for event annotations.
     *
     * @var array
     */
    protected $scanEvents = [];

    /**
     * The classes to scan for route annotations.
     *
     * @var array
     */
    protected $scanRoutes = [
        HomeController::class,
        ArticleController::class
    ];

    /**
     * Determines if we will auto-scan in the local environment.
     *
     * @var bool
     */
    protected $scanWhenLocal = true;
}
