<?php
namespace FinerThings\Domain\Reviews\Events;

use Buttercup\Protects\DomainEvent;
use Buttercup\Protects\IdentifiesAggregate;
use Carbon\Carbon;
use FinerThings\Domain\Reviews\ReviewId;

class ReviewWasScheduled implements DomainEvent
{
    private $reviewId;
    private $scheduledFor;

    /**
     * @param ReviewId $reviewId
     * @param Carbon $scheduledFor
     */
    function __construct(ReviewId $reviewId, Carbon $scheduledFor)
    {
        $this->reviewId = $reviewId;
        $this->scheduledFor = $scheduledFor;
    }

    /**
     * @return Carbon
     */
    public function getScheduledFor()
    {
        return $this->scheduledFor;
    }

    /**
     * The Aggregate this event belongs to.
     * @return IdentifiesAggregate
     */
    public function getAggregateId()
    {
        return $this->reviewId;
    }
}
 