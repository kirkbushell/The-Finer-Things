<?php
namespace FinerThings\Domain\Articles\Events;

use Buttercup\Protects\DomainEvent;
use Buttercup\Protects\IdentifiesAggregate;
use FinerThings\Domain\Articles\AuthorId;
use FinerThings\Domain\Articles\ArticleId;

class ArticleWasSaved implements DomainEvent
{
    private $articleId;
    private $authorId;
    private $category;
    private $title;
    private $content;

    function __construct(ArticleId $articleId, AuthorId $authorId, $category, $title, $content)
    {
        $this->articleId = $articleId;
        $this->authorId = $authorId;
        $this->title = $title;
        $this->content = $content;
        $this->category = $category;
    }

    public function getAuthorId()
    {
        return $this->authorId;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getContent()
    {
        return $this->content;
    }

    /**
     * The Aggregate this event belongs to.
     * @return IdentifiesAggregate
     */
    public function getAggregateId()
    {
        return $this->articleId;
    }
}
 