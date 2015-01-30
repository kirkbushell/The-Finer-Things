<?php
namespace spec\FinerThings\Domain\Categories\Data;

use FinerThings\Domain\Categories\Category;
use FinerThings\Domain\Categories\CategoryId;
use FinerThings\Domain\Categories\Data\ConfigCategoryRepository;
use PhpSpec\Laravel\LaravelObjectBehavior;
use Prophecy\Argument;

class ConfigCategoryRepositorySpec extends LaravelObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ConfigCategoryRepository::class);
    }

    function it_should_setup_the_available_categories()
    {
        $this->withTitle('Cigars')->shouldHaveType(Category::class);
    }

    function it_should_find_categories_by_their_id()
    {
        $category = $this->withId(new CategoryId('15fea4d1-416d-470a-a2cf-c32d2b0fa190'));
        $category->shouldHaveType(Category::class);
        $category->getTitle()->shouldReturn('Wine');
    }
}
