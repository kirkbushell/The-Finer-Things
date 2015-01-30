<?php
namespace FinerThings\Domain\Categories\Data;

use FinerThings\Domain\Categories\Category;
use FinerThings\Domain\Categories\CategoryId;
use Illuminate\Support\Facades\Config;

class ConfigCategoryRepository
{
    /**
     * @var array Array of Category value objects.
     */
    private static $categories = null;

    /**
     * Sets up th required categories for the reviewing system.
     */
    public function __construct()
    {
        if (is_null(static::$categories)) {
            static::$categories = $this->initialiseCategories(Config::get('categories', []));
        }
    }

    /**
     * @param string $title
     * @return null|Category
     */
    public function withTitle($title)
    {
        foreach (static::$categories as $category) {
            if ($category->getTitle() == $title) {
                return $category;
            }
        }
    }

    /**
     * Search for a given category based on its id.
     *
     * @param CategoryId $categoryId
     * @return mixed
     */
    public function withId(CategoryId $categoryId)
    {
        foreach (static::$categories as $category) {
            if ($category->getCategoryId()->equals($categoryId)) {
                return $category;
            }
        }
    }

    /**
     * Initialise the categories by converting them from array notation to use
     * the Category value object with the appropriately formatted category id.
     *
     * @param array $categories
     */
    private function initialiseCategories(array $categoryConfig)
    {
        $categories = [];

        foreach ($categoryConfig as $category) {
            $categories[] = new Category(new CategoryId($category['categoryId']), $category['title']);
        }

        return $categories;
    }
}
