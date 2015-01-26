<?php
namespace spec\FinerThings\Domain\Reviews;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ReviewWriterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('FinerThings\Domain\Reviews\Reviews');
    }
}
