<?php
namespace spec\FinerThings\Domain\Reviews;

use FinerThings\Domain\Reviews\AuthorId;
use FinerThings\Domain\Reviews\Review;
use FinerThings\Domain\Reviews\ReviewId;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ReviewSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedThrough('start', [new AuthorId(1), 'Category', 'Title', 'Content']);
        $this->shouldHaveType(Review::class);
    }

    function it_should_provide_getters()
    {
        $this->beConstructedThrough('start', [new AuthorId(1), 'Category', 'Title', 'Content']);
        $this->getReviewId()->shouldHaveType(ReviewId::class);
    }
}
