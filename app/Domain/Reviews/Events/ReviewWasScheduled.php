<?php
namespace FinerThings\Domain\Reviews\Events;

use Carbon\Carbon;
use FinerThings\Domain\Reviews\ReviewId;

class ReviewWasScheduled
{
    /**
     * @var ReviewId
     */
    private $reviewId;

    /**
     * @var Carbon
     */
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
    public function scheduledFor()
    {
        return $this->scheduledFor;
    }

    /**
     * @return ReviewId
     */
    public function reviewId()
    {
        return $this->reviewId;
    }
}
 