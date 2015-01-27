<?php
namespace spec\FinerThings\Core\Events;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EventRecorderSpec extends ObjectBehavior
{
    function let()
    {
        $this->beAnInstanceOf('spec\FinerThings\Stubs\EventRecorderStub');
    }

    public function it_should_return_the_events()
    {
        $this->getRecordedEvents()->shouldHaveType('Buttercup\Protects\DomainEvents');
    }

    public function it_should_clear_the_events()
    {
        $this->clearRecordedEvents();
        $this->events()->shouldBeArray();
        $this->events()->shouldEqual([]);
    }
}
