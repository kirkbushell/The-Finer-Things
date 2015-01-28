<?php
namespace FinerThings\Domain\Reviews\Commands;

use FinerThings\Core\Data\AggregateRepository;
use FinerThings\Domain\Reviews\Review;

class SaveReviewCommandHandler
{
    private $repository;

    public function __construct(AggregateRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle the command by saving the updated review content via the aggregate repository
     * and firing off the required domain events for this command.
     *
     * @param SaveReviewCommand $command
     */
    public function handle(SaveReviewCommand $command)
    {
        $review = $this->repository->get(Review::class, $command->getReviewId());

        $review->save(
            $command->getAuthorId(),
            $command->getContent(),
            $command->getTitle(),
            $command->getContent()
        );

        $this->repository->add($review);
    }
}
