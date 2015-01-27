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
    private $title;
    private $content;

    private function __construct(ReviewId $reviewId)
    {
        $this->reviewId = $reviewId;
    }

    /**
     * Start a new review.
     *
     * @param ReviewId $reviewId
     * @param AuthorId $authorId
     * @param $title
     * @param $content
     */
    public static function start(ReviewId $reviewId, AuthorId $authorId, $title, $content)
    {
        $review = new Review($reviewId);
        $review->recordThat(new ReviewWasStarted($reviewId, $authorId, $title, $content));
    }

    /**
     * Save an existing review with the provided content.
     *
     * @param AuthorId $authorId
     * @param $title
     * @param $content
     */
    public function save(AuthorId $authorId, $title, $content)
    {
        $this->recordThat(new ReviewWasSaved($this->reviewId, $authorId, $title, $content));
    }

    /**
     * @param AggregateHistory $aggregateHistory
     * @return Review
     */
    public static function reconstituteFrom(AggregateHistory $aggregateHistory)
    {
        $reviewId = $aggregateHistory->getAggregateId();
        $review = new Review($reviewId);

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
     * @param $event
     */
    private function setReviewData($event)
    {
        $this->title = $event->getTitle();
        $this->content = $event->getContent();
        $this->authorId = $event->getAuthor();
    }

    /**
     * @return mixed
     */
    public function getAuthorId()
    {
        return $this->authorId;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }
}
