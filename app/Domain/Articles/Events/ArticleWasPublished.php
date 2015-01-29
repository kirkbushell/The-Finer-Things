<?php
namespace FinerThings\Domain\Articles\Events;

use Buttercup\Protects\DomainEvent;
use Carbon\Carbon;
use FinerThings\Domain\Articles\ArticleId;

class ArticleWasPublished implements DomainEvent
{
    private $articleId;
    private $publishedAt;

    function __construct(ArticleId $articleId, Carbon $publishedAt)
    {
        $this->articleId = $articleId;
        $this->publishedAt = $publishedAt;
    }

    public function getAggregateId()
    {
        return $this->articleId;
    }

    public function getPublishedAt()
    {
        return $this->publishedAt;
    }
}
