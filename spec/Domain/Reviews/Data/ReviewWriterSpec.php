<?php
namespace spec\FinerThings\Domain\Reviews\Data;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ReviewWriterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('FinerThings\Domain\Reviews\Reviews');
    }
}
