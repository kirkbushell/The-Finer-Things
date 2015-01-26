<?php
namespace FinerThings\Domain\Reviews\Commands;

use FinerThings\Domain\Reviews\ReviewId;

class PublishReviewCommand
{
    private $reviewId;

    function __construct($reviewId)
    {
        $this->reviewId = new ReviewId($reviewId);
    }

    /**
     * @return mixed
     */
    public function reviewId()
    {
        return $this->reviewId;
    }

}
 