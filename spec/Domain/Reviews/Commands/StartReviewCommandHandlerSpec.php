<?php
namespace spec\FinerThings\Domain\Reviews\Commands;

use Buttercup\Protects\Tests\EventStore;
use FinerThings\Domain\Reviews\Commands\StartReviewCommand;
use FinerThings\Domain\Reviews\AuthorId;
use PhpSpec\Laravel\LaravelObjectBehavior;
use Prophecy\Argument;

class StartReviewCommandHandlerSpec extends LaravelObjectBehavior
{
    function let($eventStore)
    {
        $eventStore->beADoubleOf(EventStore::class);
        $this->beConstructedWith($eventStore);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('FinerThings\Domain\Reviews\Commands\StartReviewCommandHandler');
    }

    function it_should_handle_the_command()
    {
        $this->handle(new StartReviewCommand(new AuthorId(1), 'Wines', '2012 SA Merlot', 'This is some review content'));
    }
}
