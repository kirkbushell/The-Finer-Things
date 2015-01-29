<?php
namespace FinerThings\Domain\Articles\Commands;

use FinerThings\Core\Data\AggregateRepository;
use FinerThings\Domain\Articles\Article;

class PublishArticleCommandHandler
{
    private $repository;

    function __construct(AggregateRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(PublishArticleCommand $command)
    {
        $article = $this->repository->get(Article::class, $command->getArticleId());

    }
}
