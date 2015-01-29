<?php
namespace FinerThings\Core\Providers;

use FinerThings\Domain\Articles\Events\ArticleWasPublished;
use FinerThings\Domain\Articles\Events\ArticleWasSaved;
use FinerThings\Domain\Articles\Events\ArticleWasStarted;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider {

	/**
	 * The event handler mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		ArticleWasStarted::class => [
			'FinerThings\Domain\Articles\Listeners\Articles@whenArticleWasStarted'
		],
		ArticleWasSaved::class => [
			'FinerThings\Domain\Articles\Listeners\Articles@whenArticleWasSaved'
		],
		ArticleWasPublished::class => [
			'FinerThings\Domain\Articles\Listeners\Articles@whenArticleWasPublished'
		]
	];

	/**
	 * Register any other events for your application.
	 *
	 * @param  \Illuminate\Contracts\Events\Dispatcher  $events
	 * @return void
	 */
	public function boot(DispatcherContract $events)
	{
		parent::boot($events);
	}

}
