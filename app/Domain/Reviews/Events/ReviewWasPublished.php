<?php
namespace FinerThings\Domain\Reviews\Events;

use Buttercup\Protects\DomainEvent;
use Carbon\Carbon;
use FinerThings\Domain\Reviews\ReviewId;

class ReviewWasPublished implements DomainEvent
{
    private $reviewId;
    private $publishedAt;

    function __construct(ReviewId $reviewId, Carbon $publishedAt)
    {
        $this->reviewId = $reviewId;
        $this->publishedAt = $publishedAt;
    }

    public function getAggregateId()
    {
        return $this->reviewId;
    }

    public function getPublishedAt()
    {
        return $this->publishedAt;
    }
}
