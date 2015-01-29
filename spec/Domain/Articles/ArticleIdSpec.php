<?php
namespace spec\FinerThings\Domain\Articles;

use FinerThings\Domain\Articles\ArticleId;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ArticleIdSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith('id');
        $this->shouldHaveType(ArticleId::class);
    }

    function it_should_return_a_string()
    {
        $this->beConstructedWith('id');
        $this->__toString()->shouldReturn('id');
    }
}
