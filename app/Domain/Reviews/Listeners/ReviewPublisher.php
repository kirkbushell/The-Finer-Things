<?php
namespace FinerThings\Domain\Reviews\Listeners;

use FinerThings\Domain\Reviews\Commands\PublishReviewCommand;
use FinerThings\Domain\Reviews\Events\ReviewWasScheduled;
use Illuminate\Bus\Dispatcher;

class ReviewPublisher
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
     * @param ReviewWasScheduled $event
     */
    public function whenReviewWasScheduled(ReviewWasScheduled $event)
    {
        $command = new PublishReviewCommand($event->reviewId(), $event->scheduledFor());

        $this->dispatcher->dispatch($command);
    }
}
 