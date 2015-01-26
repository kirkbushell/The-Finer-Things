<?php
namespace FinerThings\Domain\Reviews\Commands;

use FinerThings\Domain\Reviews\Data\Review;
use FinerThings\Domain\Reviews\ReviewId;
use FinerThings\Domain\Reviews\Events\ReviewWasStarted;
use FinerThings\Domain\Reviews\Data\ReviewWriterInterface;

class StartReviewCommandHandler
{
    /**
     * @var ReviewWriter
     */
    private $reviewWriter;

    /**
     * @param ReviewWriterInterface $reviewWriter
     */
    function __construct(ReviewWriterInterface $reviewWriter)
    {
        $this->reviewWriter = $reviewWriter;
    }

    /**
     * Create a new review object and persist to the data store.
     *
     * @param StartReviewCommand $command
     */
    public function handle(StartReviewCommand $command)
    {
        $review = new Review(
            ReviewId::generate(),
            $command->authorId(),
            $command->category(),
            $command->title()
        );

        $this->reviewWriter->addReview($review);

        $this->events->dispatch(new ReviewWasStarted($review->id()));
    }
}
