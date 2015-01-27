<?php
namespace FinerThings\Core\EventStore;

use Buttercup\Protects\AggregateHistory;
use Buttercup\Protects\DomainEvent;
use Buttercup\Protects\DomainEvents;
use Buttercup\Protects\IdentifiesAggregate;
use Buttercup\Protects\Tests\EventStore;
use Carbon\Carbon;

class DoctrineEventStore implements EventStore
{
    /**
     * @param DomainEvents $events
     * @return void
     */
    public function commit(DomainEvents $events)
    {
        $this->redis->pipeline(function($pipe) use ($events) {
            foreach ($events as $event) {
                $aggregateId = $event->getAggregateId();
                $data = serialize($event);
                $event = class_basename($event);
                $date = new Carbon;

                $pipe->lpush('eventstore', json_encode($aggregateId));
            }
        });
    }

    /**
     * @param IdentifiesAggregate $id
     * @return AggregateHistory
     */
    public function getAggregateHistoryFor(IdentifiesAggregate $id)
    {
        // TODO: Implement getAggregateHistoryFor() method.
    }

    private function getEventData(DomainEvent $event)
    {
        $data = [];
        $methods = get_class_methods($event);

        foreach ($methods as $method) {
            $var = ucfirst(str_replace('get', '', $method));
        }
    }
}
