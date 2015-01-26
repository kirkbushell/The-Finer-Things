<?php
namespace FinerThings\Domain\Reviews\Commands;

use FinerThings\Domain\Reviews\Data\ReviewWriterInterface;
use FinerThings\Domain\Reviews\Events\ReviewWasScheduled;

class ScheduleReviewCommandHandler
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
     * @param ScheduleReviewCommand $command
     */
    public function handle(ScheduleReviewCommand $command)
    {
        $review = $this->reviewWriter->withId($command->reviewId());
        $this->reviewWriter->scheduleReview($review, $command->dateTime());
        $this->events->dispatch(new ReviewWasScheduled($command->reviewId(), $command->dateTime()));
    }
}
 