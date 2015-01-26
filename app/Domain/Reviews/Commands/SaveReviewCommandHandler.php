<?php
namespace FinerThings\Domain\Reviews\Commands;

use FinerThings\Domain\Reviews\AuthorId;
use FinerThings\Domain\Reviews\Data\Review;
use FinerThings\Domain\Reviews\Data\ReviewWriterInterface;
use FinerThings\Domain\Reviews\Events\ReviewWasSaved;
use FinerThings\Domain\Reviews\ReviewId;

class SaveReviewCommandHandler
{
    /**
     * @var ReviewWriterInterface
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
     * @param SaveReviewCommand $command
     */
    public function handle(SaveReviewCommand $command)
    {
        $review = new Review(
            new ReviewId($command->id()),
            $command->authorId(),
            $command->category(),
            $command->title()
        );

        $this->reviewWriter->saveReview($review);

        $this->events->dispatch(new ReviewWasSaved($review->id()));
    }
}
