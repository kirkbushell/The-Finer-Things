<?php
namespace FinerThings\Core\EventStore;

use Buttercup\Protects\AggregateHistory;
use Buttercup\Protects\DomainEvents;
use Buttercup\Protects\IdentifiesAggregate;
use Buttercup\Protects\Tests\EventStore;
use Carbon\Carbon;
use Doctrine\ORM\EntityManagerInterface;
use FinerThings\Core\Events\Event;

class DoctrineEventStore implements EventStore
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Loop through each of the domain events and add them to the records
     * on the event store. Flush the unit of work once it's ready.
     *
     * @param DomainEvents $events
     * @return void
     */
    public function commit(DomainEvents $events)
    {
        foreach ($events as $e) {
            $event = $this->buildEvent($e);

            $this->entityManager->persist($event);
        }

        $this->entityManager->flush();
    }

    /**
     * Query for and return an array of events that have been stored using
     * the aggregateId provided.
     *
     * @param IdentifiesAggregate $aggregateId
     * @return AggregateHistory
     */
    public function getAggregateHistoryFor(IdentifiesAggregate $aggregateId)
    {
        $eventHistory = $this->getEventHistory($aggregateId);

        return new AggregateHistory($aggregateId, $this->populateEvents($eventHistory));
    }

    /**
     * Query the database for the required event history based on the aggregateId.
     *
     * @param $aggregateId
     * @return mixed
     */
    protected function getEventHistory($aggregateId)
    {
        $queryBuilder = $this->entityManager->createQueryBuilder();
        $query = $queryBuilder->select('e')
            ->from(Event::class, 'e')
            ->where('e.aggregate_id = :aggregateId')
            ->orderBy('e.date')
            ->setParameter('aggregateId', $aggregateId)
            ->getQuery();

        return $query->getResult();
    }

    /**
     * Populate an array with the events provided via the event history.
     *
     * @param $eventHistory
     * @return array
     */
    protected function populateEvents($eventHistory)
    {
        return array_map(function($event) {
            return $event->getEvent();
        }, $eventHistory);
    }

    /**
     * Construct a new event object to be persisted later.
     *
     * @param DomainEvent $domainEvent
     * @return Event
     */
    protected function buildEvent(DomainEvent $domainEvent)
    {
        return new Event(
            $domainEvent->getAggregateId(),
            class_basename($domainEvent),
            serialize($domainEvent),
            new Carbon
        );
    }
}
