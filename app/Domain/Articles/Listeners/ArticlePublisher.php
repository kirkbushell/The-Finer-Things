<?php
namespace FinerThings\Domain\Articles\Listeners;

use FinerThings\Domain\Articles\Commands\PublishArticleCommand;
use FinerThings\Domain\Articles\Events\ArticleWasScheduled;
use Illuminate\Bus\Dispatcher;

class ArticlePublisher
{
    /**
     * @var Dispatcher
     */
    private $dispatcher;

    /**
     * @param Dispatcher $dispatcher
     */
    function __construct(Dispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * Here we dispatch a new command, which will run in the future via the queue service.
     *
     * @param ArticleWasScheduled $event
     */
    public function whenArticleWasScheduled(ArticleWasScheduled $event)
    {
        $command = new PublishArticleCommand($event->articleId(), $event->scheduledFor());

        $this->dispatcher->dispatch($command);
    }
}
 