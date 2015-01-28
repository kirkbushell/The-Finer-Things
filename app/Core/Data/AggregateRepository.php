<?php
namespace FinerThings\Core\Data;

use Buttercup\Protects\IdentifiesAggregate;
use Buttercup\Protects\RecordsEvents;
use Buttercup\Protects\Tests\EventStore;
use FinerThings\Core\Events\EventDispatcher;
use FinerThings\Domain\Reviews\Review;

class AggregateRepository
{
    use EventDispatcher;

    private $eventStore;

    function __construct(EventStore $eventStore)
    {
        $this->eventStore = $eventStore;
    }

    /**
     * Add the aggregate's recorded events to the event store.
     *
     * @param RecordsEvents $aggregate
     */
    public function add(RecordsEvents $aggregate)
    {
        $events = $aggregate->getRecordedEvents();

        $this->eventStore->commit($events);
        $this->dispatch($events);

        $aggregate->clearRecordedEvents();
    }

    /**
     * Retrieve all historical events for the aggregate then rebuild the object from those events.
     *
     * @param string $aggregate - Full class path to the aggregate in question
     * @param IdentifiesAggregate $id
     * @return Review
     */
    public function get($aggregate, IdentifiesAggregate $id)
    {
        $aggregateHistory = $this->eventStore->getAggregateHistoryFor($id);

        return call_user_func_array("$aggregate::reconstituteFrom", [$aggregateHistory]);
    }
}
