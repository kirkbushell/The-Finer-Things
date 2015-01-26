<?php
namespace FinerThings\Domain\Reviews\Data;

use Carbon\Carbon;
use FinerThings\Domain\Reviews\ReviewId;

interface ReviewWriterInterface
{
    /**
     * Add a new review to the data store.
     *
     * @param Review $review
     */
    public function addReview(Review $review);

    /**
     * Retrieves a specific review with the provided id. Only
     * used for further writing purposes.
     *
     * @param ReviewId $reviewId
     * @return Review
     */
    public function withId(ReviewId $reviewId);

    /**
     * Schedule a review to be published at the given date and time.
     *
     * @param Review $review
     * @param Carbon $dateTime
     * @return void
     */
    public function scheduleReview(Review $review, Carbon $dateTime);
}
 