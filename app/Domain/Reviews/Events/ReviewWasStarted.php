<?php
namespace FinerThings\Domain\Reviews\Events;

use Buttercup\Protects\DomainEvent;
use Buttercup\Protects\IdentifiesAggregate;
use FinerThings\Domain\Reviews\ReviewId;

class ReviewWasStarted implements DomainEvent
{
    private $reviewId;
    private $authorId;
    private $title;
    private $content;

    /**
     * @param ReviewId $reviewId
     */
    function __construct(ReviewId $reviewId, AuthorId $authorId, $title, $content)
    {
        $this->reviewId = $reviewId;
        $this->authorId = $authorId;
        $this->title = $title;
        $this->content = $content;
    }

    public function getAuthorId()
    {
        return $this->authorId;
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
 