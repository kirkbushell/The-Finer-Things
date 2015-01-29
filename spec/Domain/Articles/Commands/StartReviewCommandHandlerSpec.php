<?php
namespace spec\FinerThings\Domain\Articles\Commands;

use FinerThings\Domain\Articles\Commands\StartArticleCommand;
use FinerThings\Domain\Articles\AuthorId;
use FinerThings\Core\Data\AggregateRepository;
use PhpSpec\Laravel\LaravelObjectBehavior;
use Prophecy\Argument;

class StartArticleCommandHandlerSpec extends LaravelObjectBehavior
{
    function let($repository)
    {
        $repository->beADoubleOf(AggregateRepository::class);
        $this->beConstructedWith($repository);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('FinerThings\Domain\Articles\Commands\StartArticleCommandHandler');
    }

    function it_should_handle_the_command()
    {
        $this->handle(new StartArticleCommand(new AuthorId(1), 'Wines', '2012 SA Merlot', 'This is some article content'));
    }
}
