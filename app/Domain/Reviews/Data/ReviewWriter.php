<?php
namespace FinerThings\Domain\Reviews\Data;

use Carbon\Carbon;
use FinerThings\Domain\Reviews\EntityManager;
use FinerThings\Domain\Reviews\ReviewId;

class ReviewWriter implements ReviewWriterInterface
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Add a new review to the database.
     *
     * @param Review $review
     */
    public function addReview(Review $review)
    {
        $this->entityManager->persist($review);
        $this->entityManager->flush();
    }

    /**
     * Retrieves a specific review with the provided id. Only
     * used for further writing purposes.
     *
     * @param ReviewId $reviewId
     * @return mixed
     */
    public function withId(ReviewId $reviewId)
    {

    }

    /**
     * Schedule a review to be published at the given date and time.
     *
     * @param Review $review
     * @param Carbon $dateTime
     * @return void
     */
    public function scheduleReview(Review $review, Carbon $dateTime)
    {
        $review->scheduledFor($dateTime);

        $this->entityManager->persist($scheduledReview);
        $this->entityManager->flush();
    }


    /**
     * Saves any updates on the review to the data store.
     *
     * @param Review $review
     */
    public function saveReview(Review $review)
    {
        $this->entityManager->persist($review);
        $this->entityManager->flush();
    }
}
