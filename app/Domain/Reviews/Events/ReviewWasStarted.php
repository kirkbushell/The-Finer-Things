<?php
namespace FinerThings\Domain\Reviews\Events;

use Buttercup\Protects\DomainEvent;
use Buttercup\Protects\IdentifiesAggregate;
use FinerThings\Domain\Reviews\ReviewId;

class ReviewWasStarted implements DomainEvent
{
    private $reviewId;
    private $title;
    private $content;

    /**
     * @param ReviewId $reviewId
     */
    function __construct(ReviewId $reviewId, $title, $content)
    {
        $this->reviewId = $reviewId;
        $this->title = $title;
        $this->content = $content;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getContent()
    {
        return $this->content;
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
 