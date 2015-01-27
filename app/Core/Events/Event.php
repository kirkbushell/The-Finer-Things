<?php
namespace FinerThings\Core\Events;

/**
 * Class Event
 *
 * @package FinerThings\Core\Events
 * @Entity
 */
class Event
{
    /**
     * @Column(name="aggregate_id", type="string", length=36, nullable=false)
     */
    private $aggregateId;

    /**
     * @Column(type="string", nullable=false)
     */
    private $event;

    /**
     * @Column(type="text", nullable=false)
     */
    private $data;

    /**
     * @Column(type="datetime", nullable=false)
     */
    private $date;

    public function __construct($aggregateId, $event, $data, $date)
    {
        $this->aggregateId = $aggregateId;
        $this->event = $event;
        $this->data = $data;
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getAggregateId()
    {
        return $this->aggregateId;
    }

    /**
     * @return DomainEvent
     */
    public function getEvent()
    {
        return unserialize($this->event);
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }
}
