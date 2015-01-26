<?php
namespace spec\FinerThings\Domain\Reviews\Data;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StartReviewCommandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->init();
        $this->shouldHaveType('FinerThings\Domain\Reviews\Commands\StartReviewCommand');
    }

    function it_returns_required_fields()
    {
        $this->init();
        $this->category()->shouldReturn('Cigars');
        $this->title()->shouldReturn('Behike 54');
    }

    function it_should_return_the_author_id()
    {
        $this->init();
        $this->authorId()->shouldReturn(1);
    }

    private function init()
    {
        $this->beConstructedWith(1, 'Cigars', 'Behike 54');
    }
}
