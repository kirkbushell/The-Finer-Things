<?php
namespace FinerThings\Domain\Reviews\Commands;

use Carbon\Carbon;
use FinerThings\Domain\Reviews\ReviewId;

class ScheduleReviewCommand
{
    private $reviewId;
    private $dateTime;

    function __construct($reviewId, $dateTime)
    {
        $this->reviewId = new ReviewId($reviewId);
        $this->dateTime = new Carbon($dateTime);
    }

    /**
     * @return Carbon
     */
    public function dateTime()
    {
        return $this->dateTime;
    }

    /**
     * @return ReviewId
     */
    public function reviewId()
    {
        return $this->reviewId;
    }
}
