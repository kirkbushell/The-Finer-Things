<?php
namespace spec\FinerThings\Domain\Reviews\Data;

use FinerThings\Domain\Categories\Category;
use FinerThings\Domain\Reviews\AuthorId;
use FinerThings\Domain\Reviews\ReviewId;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ReviewSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->init();
        $this->shouldHaveType('FinerThings\Domain\Reviews\Data\Review');
    }

    function it_should_allow_title_to_be_changed()
    {
        $this->init();
        $this->setTitle('Cohiba Behike 52');
        $this->title()->shouldReturn('Cohiba Behike 52');
    }

    function it_should_return_the_author_id()
    {
        $this->init();
        $this->authorId()->shouldHaveType('FinerThings\Domain\Reviews\AuthorId');
    }

    function it_should_manage_the_review_content()
    {
        $this->init();
        $this->setContent('This is a review');
        $this->content()->shouldReturn('This is a review');
    }

    private function init()
    {
        $this->beConstructedWith(
            ReviewId::generate(),
            new AuthorId(1),
            new Category('cigars'),
            'Montecristo No. 2'
        );
    }
}
