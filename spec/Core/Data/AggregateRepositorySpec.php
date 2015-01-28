<?php
namespace spec\FinerThings\Domain\Reviews\Data;

use Buttercup\Protects\Tests\EventStore;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AggregateRepositorySpec extends ObjectBehavior
{
    private $eventStore;

    function let($eventStore)
    {
        $this->eventStore = $eventStore;
        $this->eventStore->beADoubleOf(EventStore::class);
        $this->beConstructedWith($this->eventStore);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('FinerThings\Domain\Reviews\Data\ReviewRepository');
    }
}
