<?php
namespace FinerThings\Core\Events;

use Buttercup\Protects\DomainEvents;
use Illuminate\Support\Facades\Event as EventFacade;

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
            EventFacade::fire($event);
        }
    }
}
