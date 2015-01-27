<?php
namespace FinerThings\Domain\Reviews\Commands;

use Buttercup\Protects\Tests\EventStore;
use FinerThings\Domain\Reviews\Review;

class SaveReviewCommandHandler
{
    /**
     * @var EventStore
     */
    private $eventStore;

    public function __construct(EventStore $eventStore)
    {
        $this->eventStore = $eventStore;
    }

    public function handle(SaveReviewCommand $command)
    {
        $review = Review::reconstituteFrom(
            $this->getAggregateHistory($command->getReviewId())
        );

        $review->save(
            $command->getAuthorId(),
            $command->getContent(),
            $command->getTitle(),
            $command->getContent()
        );

        $this->eventStore->commit($review->getRecordedEvents());
    }

    private function getAggregateHistory($reviewId)
    {
        return $this->eventStore->getAggregateHistoryFor($reviewId);
    }
}
