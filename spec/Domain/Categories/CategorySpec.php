<?php
namespace spec\FinerThings\Domain\Categories;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CategorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith('cigars');
        $this->shouldHaveType('FinerThings\Domain\Categories\Category');
    }

    function it_should_return_the_title()
    {
        $this->beConstructedWith('cigars');
        $this->title()->shouldReturn('cigars');
        $this->__toString()->shouldReturn('cigars');
    }

    function it_should_generate_a_slug()
    {
        $this->beConstructedWith('Cigars & Wines');
        $this->slug()->shouldReturn('cigars-wines');
    }
}
