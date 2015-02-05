<?php
namespace FinerThings\Core\Providers;

use Illuminate\Support\ServiceProvider;

class MacroServiceProvider extends ServiceProvider
{
    public function register() {}

	public function boot()
    {
        require __DIR__.'/../../../bootstrap/macros.php';
    }
}
