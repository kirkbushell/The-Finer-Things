<?php
namespace spec\FinerThings\Domain\Categories;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CategoriesSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('FinerThings\Domain\Categories\Categories');
    }

    function it_should_setup_the_available_categories()
    {
        $this->withTitle('Cigars')->shouldHaveType('FinerThings\Domain\Categories\Category');
    }
}
