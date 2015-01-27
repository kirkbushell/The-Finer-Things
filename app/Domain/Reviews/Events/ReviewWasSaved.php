<?php
namespace FinerThings\Domain\Reviews\Events;

use Buttercup\Protects\DomainEvent;
use Buttercup\Protects\IdentifiesAggregate;
use FinerThings\Domain\Reviews\AuthorId;
use FinerThings\Domain\Reviews\ReviewId;

class ReviewWasSaved implements DomainEvent
{
    private $reviewId;
    private $authorId;
    private $category;
    private $title;
    private $content;

    function __construct(ReviewId $reviewId, AuthorId $authorId, $category, $title, $content)
    {
        $this->reviewId = $reviewId;
        $this->authorId = $authorId;
        $this->title = $title;
        $this->content = $content;
        $this->category = $category;
    }

    public function getAuthorId()
    {
        return $this->authorId;
    }

    public function getCategory()
    {
        return $this->category;
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
 