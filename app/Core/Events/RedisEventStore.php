<?php
namespace FinerThings\Core\EventStore;

use Buttercup\Protects\AggregateHistory;
use Buttercup\Protects\DomainEvents;
use Buttercup\Protects\IdentifiesAggregate;
use Buttercup\Protects\Tests\EventStore;

class RedisEventStore implements EventStore
{
    /**
     * @param DomainEvents $events
     * @return void
     */
    public function commit(DomainEvents $events)
    {
        // TODO: Implement commit() method.
    }

    /**
     * @param IdentifiesAggregate $id
     * @return AggregateHistory
     */
    public function getAggregateHistoryFor(IdentifiesAggregate $id)
    {
        // TODO: Implement getAggregateHistoryFor() method.
    }
}
