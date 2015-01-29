<?php
namespace spec\FinerThings\Domain\Articles;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AuthorNameSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->init();
        $this->shouldHaveType('FinerThings\Domain\Articles\AuthorName');
    }

    function it_should_return_first_name()
    {
        $this->init();
        $this->firstName()->shouldReturn('Kirk');
    }

    function it_should_return_last_name()
    {
        $this->init();
        $this->lastName()->shouldReturn('Bushell');
    }

    function it_should_return_fullname()
    {
        $this->init();
        $this->fullName()->shouldReturn('Kirk Bushell');
    }

    private function init()
    {
        $this->beConstructedWith('Kirk', 'Bushell');
    }
}
