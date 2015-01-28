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

    public function getReviewId()
    {
        return $this->reviewId;
    }
}
 