<?php
namespace FinerThings\Domain\Articles\Commands;

use FinerThings\Core\Data\AggregateRepository;
use FinerThings\Domain\Articles\Article;

class SaveArticleCommandHandler
{
    private $repository;

    public function __construct(AggregateRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle the command by saving the updated article content via the aggregate repository
     * and firing off the required domain events for this command.
     *
     * @param SaveArticleCommand $command
     */
    public function handle(SaveArticleCommand $command)
    {
        $article = $this->repository->get(Article::class, $command->getArticleId());

        $article->save(
            $command->getAuthorId(),
            $command->getContent(),
            $command->getTitle(),
            $command->getContent()
        );

        $this->repository->add($article);
    }
}
