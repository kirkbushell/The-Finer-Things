<?php
namespace FinerThings\Domain\Articles;

use Buttercup\Protects\AggregateHistory;
use Buttercup\Protects\DomainEvent;
use Buttercup\Protects\IsEventSourced;
use Buttercup\Protects\RecordsEvents;
use Buttercup\Protects\When;
use Carbon\Carbon;
use FinerThings\Core\Events\EventRecorder;
use FinerThings\Domain\Articles\Events\ArticleWasPublished;
use FinerThings\Domain\Articles\Events\ArticleWasSaved;
use FinerThings\Domain\Articles\Events\ArticleWasStarted;

final class Article implements RecordsEvents, IsEventSourced
{
    use EventRecorder;
    use When;

    private $articleId;
    private $authorId;
    private $category;
    private $title;
    private $content;
    private $publishedAt;

    /**
     * Article aggregate can only be constructed via a new article being started, or a article
     * being reconstituted from the event store.
     *
     * @param ArticleId $articleId
     */
    private function __construct(ArticleId $articleId)
    {
        $this->articleId = $articleId;
    }

    /**
     * Start a new article.
     *
     * @param AuthorId $authorId
     * @param string $category
     * @param string $title
     * @param string $content
     * @return Article
     */
    public static function start(AuthorId $authorId, $category, $title, $content)
    {
        $articleId = ArticleId::generate();

        $article = new Article($articleId);
        $article->recordThat(new ArticleWasStarted($articleId, $authorId, $category, $title, $content));

        return $article;
    }

    /**
     * Save an existing article with the provided content.
     *
     * @param AuthorId $authorId
     * @param $category
     * @param $title
     * @param $content
     */
    public function save(AuthorId $authorId, $category, $title, $content)
    {
        $this->recordThat(new ArticleWasSaved($this->articleId, $authorId, $category, $title, $content));
    }

    /**
     * Publish the requested article.
     *
     * @fires ArticleWasPublished
     */
    public function publish()
    {
        $this->recordThat(new ArticleWasPublished($this->getArticleId(), new Carbon));
    }

    /**
     * @param AggregateHistory $aggregateHistory
     * @return Article
     */
    public static function reconstituteFrom(AggregateHistory $aggregateHistory)
    {
        $articleId = $aggregateHistory->getAggregateId();
        $article = new Article(new ArticleId($articleId));

        foreach ($aggregateHistory as $event) {
            $article->when($event);
        }

        return $article;
    }

    /**
     * Handle the reconstitution from specific events.
     *
     * @param DomainEvent $event
     */
    public function when(DomainEvent $event)
    {
        switch ($event) {
            case ArticleWasStarted::class:
            case ArticleWasSaved::class:
                $this->setArticleData($event);
                break;
            case ArticleWasPublished::class:
                $this->whenArticleWasPublished($event);
                break;
        }
    }

    /**
     * @param DomainEvent $event
     */
    private function setArticleData(DomainEvent $event)
    {
        $this->category = $event->getCategory();
        $this->title = $event->getTitle();
        $this->content = $event->getContent();
        $this->authorId = $event->getAuthorId();
    }

    public function getArticleId()
    {
        return $this->articleId;
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

    public function getPublishedAt()
    {
        return $this->publishedAt;
    }

    private function whenArticleWasPublished(ArticleWasPublished $event)
    {
        $this->publishedAt = $event->getPublishedAt();
    }
}
