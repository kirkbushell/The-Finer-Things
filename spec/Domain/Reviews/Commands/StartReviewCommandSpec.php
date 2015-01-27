<?php
namespace spec\FinerThings\Domain\Reviews\Commands;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StartReviewCommandSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(1, 'Cigars', 'Behike 54', 'Content');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('FinerThings\Domain\Reviews\Commands\StartReviewCommand');
    }

    function it_returns_required_fields()
    {
        $this->getAuthorId()->shouldReturn(1);
        $this->getCategory()->shouldReturn('Cigars');
        $this->getTitle()->shouldReturn('Behike 54');
        $this->getContent()->shouldReturn('Content');
    }
}
