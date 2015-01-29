<?php
namespace FinerThings\Domain\Articles\Events;

use Buttercup\Protects\DomainEvent;
use Buttercup\Protects\IdentifiesAggregate;
use Carbon\Carbon;
use FinerThings\Domain\Articles\ArticleId;

class ArticleWasScheduled implements DomainEvent
{
    private $articleId;
    private $scheduledFor;

    /**
     * @param ArticleId $articleId
     * @param Carbon $scheduledFor
     */
    function __construct(ArticleId $articleId, Carbon $scheduledFor)
    {
        $this->articleId = $articleId;
        $this->scheduledFor = $scheduledFor;
    }

    /**
     * @return Carbon
     */
    public function getScheduledFor()
    {
        return $this->scheduledFor;
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
 