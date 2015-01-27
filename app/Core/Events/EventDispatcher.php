<?php
namespace FinerThings\Core\Events;

use Buttercup\Protects\DomainEvents;
use Illuminate\Support\Facades\Event;

trait EventDispatcher
{
    /**
     * Dispatches an array of events.
     *
     * @param DomainEvents $events
     */
    protected function dispatch(DomainEvents $events)
    {
        foreach ($events as $event) {
            Event::fire($event);
        }
    }
}
