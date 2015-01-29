<?php
namespace FinerThings\Domain\Articles;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AuthorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith('Kirk', 'Bushell');
        $this->shouldHaveType('FinerThings\Domain\Articles\Author');
    }

    function it_should_return_the_fullname()
    {
        $this->beConstructedWith('Kirk', 'Bushell');
        $this->fullName()->shouldReturn('Kirk Bushell');
    }
}
