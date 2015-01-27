<?php
namespace FinerThings\Core\Events;

use Buttercup\Protects\DomainEvents;

trait EventRecorder
{
    /**
     * Stores an array of events that need to be recorded.
     *
     * @var DomainEvent[]
     */
    protected $events = [];

    /**
     * Get all the Domain Events that were recorded since the last time it was cleared, or since it was
     * restored from persistence. This does not include events that were recorded prior.
     *
     * @return DomainEvents
     */
    public function getRecordedEvents()
    {
        return new DomainEvents($this->events);
    }

    /**
     * Clears the record of new Domain Events. This doesn't clear the history of the object.
     *
     * @return void
     */
    public function clearRecordedEvents()
    {
        $this->events = [];
    }
}
