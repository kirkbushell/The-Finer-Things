<?php
namespace FinerThings\Domain\Reviews\Commands;

use Buttercup\Protects\Tests\EventStore;
use FinerThings\Core\Events\EventDispatcher;
use FinerThings\Domain\Reviews\AuthorId;
use FinerThings\Domain\Reviews\Review;

class StartReviewCommandHandler
{
    use EventDispatcher;

    private $eventStore;

    public function __construct(EventStore $eventStore)
    {
        $this->eventStore = $eventStore;
    }

    /**
     * Create a new review object and persist to the data store.
     *
     * @param StartReviewCommand $command
     */
    public function handle(StartReviewCommand $command)
    {
        $review = Review::start(
            new AuthorId($command->getAuthorId()),
            $command->getCategory(),
            $command->getTitle(),
            $command->getContent()
        );

        $this->eventStore->commit($review->getRecordedEvents());
        $this->dispatch($review->getRecordedEvents());
    }
}
