<?php
namespace spec\FinerThings\Domain\Reviews;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ReviewSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('FinerThings\Domain\Reviews\Review');
    }
}
