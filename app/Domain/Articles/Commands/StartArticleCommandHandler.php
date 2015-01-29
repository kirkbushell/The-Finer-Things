<?php
namespace FinerThings\Domain\Articles\Commands;

use FinerThings\Domain\Articles\AuthorId;
use FinerThings\Core\Data\AggregateRepository;
use FinerThings\Domain\Articles\Article;

class StartArticleCommandHandler
{
    private $repository;

    public function __construct(AggregateRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Create a new article object and persist to the data store.
     *
     * @param StartArticleCommand $command
     */
    public function handle(StartArticleCommand $command)
    {
        $article = Article::start(
            new AuthorId($command->getAuthorId()),
            $command->getCategory(),
            $command->getTitle(),
            $command->getContent()
        );

        $this->repository->add($article);
    }
}
