<?php
namespace spec\FinerThings\Domain\Categories;

use FinerThings\Domain\Categories\Category;
use FinerThings\Domain\Categories\CategoryId;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CategorySpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(new CategoryId('ljsdflkjsdf'), 'Cigars');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Category::class);
    }

    function it_should_return_the_title()
    {
        $this->getTitle()->shouldReturn('Cigars');
        $this->__toString()->shouldReturn('Cigars');
    }

    function it_should_generate_a_slug()
    {
        $this->beConstructedWith(new Categoryid('lkjsdlfkjsdf'), 'Cigars & Wines');
        $this->getSlug()->shouldReturn('cigars-wines');
    }
}
