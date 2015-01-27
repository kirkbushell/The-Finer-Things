<?php
namespace spec\FinerThings\Domain\Reviews\Commands;

use Buttercup\Protects\Tests\EventStore;
use FinerThings\Domain\Reviews\Commands\StartReviewCommand;
use FinerThings\Domain\Reviews\AuthorId;
use PhpSpec\Laravel\LaravelObjectBehavior;
use Prophecy\Argument;

class StartReviewCommandHandlerSpec extends LaravelObjectBehavior
{
    protected $httpKernelClass = 'FinerThings\Http\Kernel';

    function let($eventStore)
    {
        $eventStore->beADoubleOf(EventStore::class);
        $this->beConstructedWith($eventStore);
    }

    function it_is_initializable($eventStore)
    {
        $this->shouldHaveType('FinerThings\Domain\Reviews\Commands\StartReviewCommandHandler');
    }

    function it_should_handle_the_command($eventStore)
    {;
        $this->handle(new StartReviewCommand(new AuthorId(1), 'Wines', '2012 SA Merlot', 'This is some review content'));
    }
}
