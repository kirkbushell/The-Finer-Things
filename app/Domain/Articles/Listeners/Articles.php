<?php
namespace FinerThings\Domain\Articles\Projections;

use FinerThings\Domain\Articles\Data\RedisArticlesRepository;
use FinerThings\Domain\Articles\Events\ArticleWasPublished;
use FinerThings\Domain\Articles\Events\ArticleWasSaved;
use FinerThings\Domain\Articles\Events\ArticleWasStarted;

class Articles
{
    /**
     * @var RedisArticlesRepository
     */
    private $articleRepository;

    public function __construct(RedisArticlesRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

	public function whenArticleWasStarted(ArticleWasStarted $event)
    {
        $this->articleRepository->create(
            $event->getAggregateId(),
            $event->getCategory(),
            $event->getTitle(),
            $event->getContent()
        );
    }

    public function whenArticleWasSaved(ArticleWasSaved $event)
    {
        $this->articleRepository->update(
            $event->getAggregateId(),
            $event->getCategory(),
            $event->getTitle(),
            $event->getContent()
        );
    }

    public function whenArticleWasPublished(ArticleWasPublished $event)
    {
        $this->articleRepository->publish($event->getAggregateId());
    }
}
