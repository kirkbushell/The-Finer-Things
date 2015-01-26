<?php
namespace FinerThings\Domain\Categories;

class Categories
{
    /**
     * @var array Array of Category value objects.
     */
    private static $categories = [];

    /**
     * Sets up th required categories for the reviewing system.
     */
    public function __construct()
    {
        if (!static::$categories) {
            static::$categories = [
                new Category('Cigars')
            ];
        }
    }

    /**
     * @param string $title
     * @return null|Category
     */
    public function withTitle($title)
    {
        foreach (static::$categories as $category) {
            if ($category->title() == $title) {
                return $category;
            }
        }
    }
}
