<?php
namespace spec\FinerThings\Domain\Categories\Data;

use FinerThings\Domain\Categories\Category;
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
}
