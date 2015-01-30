<?php

namespace spec\FinerThings\Domain\Categories;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CategoryIdSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('category id');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('FinerThings\Domain\Categories\CategoryId');
    }
}
