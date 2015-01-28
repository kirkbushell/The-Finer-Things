<?php
namespace FinerThings\Domain\Reviews;

use Buttercup\Protects\AggregateHistory;
use Buttercup\Protects\DomainEvent;
use Buttercup\Protects\IsEventSourced;
use Buttercup\Protects\RecordsEvents;
use Buttercup\Protects\When;
use FinerThings\Core\Events\EventRecorder;
use FinerThings\Domain\Reviews\Events\ReviewWasSaved;
use FinerThings\Domain\Reviews\Events\ReviewWasStarted;

final class Review implements RecordsEvents, IsEventSourced
{
    use EventRecorder;
    use When;

    private $reviewId;
    private $authorId;
    private $category;
    private $title;
    private $content;

    /**
     * Review aggregate can only be constructed via a new review being started, or a review
     * being reconstituted from the event store.
     *
     * @param ReviewId $reviewId
     */
    private function __construct(ReviewId $reviewId)
    {
        $this->reviewId = $reviewId;
    }

    /**
     * Start a new review.
     *
     * @param AuthorId $authorId
     * @param string $category
     * @param string $title
     * @param string $content
     * @return Review
     */
    public static function start(AuthorId $authorId, $category, $title, $content)
    {
        $reviewId = ReviewId::generate();

        $review = new Review($reviewId);
        $review->recordThat(new ReviewWasStarted($reviewId, $authorId, $category, $title, $content));

        return $review;
    }

    /**
     * Save an existing review with the provided content.
     *
     * @param AuthorId $authorId
     * @param $category
     * @param $title
     * @param $content
     */
    public function save(AuthorId $authorId, $category, $title, $content)
    {
        $this->recordThat(new ReviewWasSaved($this->reviewId, $authorId, $category, $title, $content));
    }

    /**
     * @param AggregateHistory $aggregateHistory
     * @return Review
     */
    public static function reconstituteFrom(AggregateHistory $aggregateHistory)
    {
        $reviewId = $aggregateHistory->getAggregateId();
        $review = new Review(new ReviewId($reviewId));

        foreach ($aggregateHistory as $event) {
            $review->when($event);
        }

        return $review;
    }

    /**
     * Handle the reconstitution from specific events.
     *
     * @param DomainEvent $event
     */
    public function when(DomainEvent $event)
    {
        switch ($event) {
            case ReviewWasStarted::class:
            case ReviewWasSaved::class:
                $this->setReviewData($event);
                break;
        }
    }

    /**
     * @param DomainEvent $event
     */
    private function setReviewData(DomainEvent $event)
    {
        $this->category = $event->getCategory();
        $this->title = $event->getTitle();
        $this->content = $event->getContent();
        $this->authorId = $event->getAuthor();
    }

    public function getReviewId()
    {
        return $this->reviewId;
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
}
