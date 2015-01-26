<?php
namespace FinerThings\Domain\Reviews;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AuthorIdSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith('khjasdfkjhasdfkhjasdf');
        $this->shouldHaveType('FinerThings\Domain\Reviews\AuthorId');
    }

    function it_should_expose_id()
    {
        $this->beConstructedWith('kjsdlkjsdf');
        $this->id()->shouldReturn('kjsdlkjsdf');
    }

    function it_should_return_a_string_value()
    {
        $this->beConstructedWith('ids');
        $this->__toString()->shouldReturn('ids');
    }
}
