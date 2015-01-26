<?php
namespace FinerThings\Domain\Reviews\Commands;

use FinerThings\Domain\Reviews\Data\ReviewWriter;

class PublishReviewCommandHandler
{
    /**
     * @var ReviewWriter
     */
    private $reviews;

    function __construct(ReviewWriter $reviews)
    {
        $this->reviews = $reviews;
    }

    public function handle(PublishReviewCommand $command)
    {
        $review = $this->reviews->withId($command->reviewId());

        $this->reviews->publishReview($review);
    }
}
