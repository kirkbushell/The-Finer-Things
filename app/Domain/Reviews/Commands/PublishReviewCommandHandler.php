<?php
namespace FinerThings\Domain\Reviews\Commands;

use FinerThings\Core\Data\AggregateRepository;
use FinerThings\Domain\Reviews\Review;

class PublishReviewCommandHandler
{
    private $repository;

    function __construct(AggregateRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(PublishReviewCommand $command)
    {
        $review = $this->repository->get(Review::class, $command->getReviewId());

    }
}
