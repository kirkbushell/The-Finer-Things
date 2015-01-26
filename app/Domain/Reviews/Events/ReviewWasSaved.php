<?php
namespace FinerThings\Domain\Reviews\Events;

use FinerThings\Domain\Reviews\ReviewId;

class ReviewWasSaved
{
    /**
     * @var ReviewId
     */
    private $reviewId;

    /**
     * @param ReviewId $reviewId
     */
    function __construct(ReviewId $reviewId)
    {
        $this->reviewId = $reviewId;
    }

    /**
     * @return ReviewId
     */
    public function reviewId()
    {
        return $this->reviewId;
    }
}
 