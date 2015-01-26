<?php
namespace spec\FinerThings\Domain\Reviews;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ReviewIdSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith('id');
        $this->shouldHaveType('FinerThings\Domain\Reviews\ReviewId');
    }

    function it_should_return_a_string()
    {
        $this->beConstructedWith('id');
        $this->__toString()->shouldReturn('id');
    }
}
