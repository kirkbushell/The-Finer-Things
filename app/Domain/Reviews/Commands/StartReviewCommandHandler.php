<?php
namespace FinerThings\Domain\Reviews\Commands;

use FinerThings\Domain\Reviews\AuthorId;
use FinerThings\Domain\Reviews\Review;

class StartReviewCommandHandler
{
    /**
     * Create a new review object and persist to the data store.
     *
     * @param StartReviewCommand $command
     */
    public function handle(StartReviewCommand $command)
    {
        Review::start(
            ReviewId::generate(),
            new AuthorId($command->getAuthorId()),
            $command->getCategory(),
            $command->getTitle(),
            $command->getContent()
        );
    }
}
