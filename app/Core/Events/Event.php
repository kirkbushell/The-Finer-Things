<?php
namespace FinerThings\Core\Events;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Event
 *
 * @package FinerThings\Core\Events
 * @Orm\Table("events")
 * @ORM\Entity()
 */
class Event
{
    /**
     * @ORM\Id
     * @ORM\Column(name="aggregate_id", type="string", length=36, nullable=false)
     */
    private $aggregateId;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $event;

    /**
     * @ORM\Column(type="text", nullable=false)
     */
    private $data;

    /**
     * @ORM\Column(type="datetime", nullable=false)
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
