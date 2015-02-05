<?php
namespace FinerThings\Domain\Categories\Data;

use Illuminate\Support\Facades\DB;

class Categories
{
    private $category;

    function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function all()
    {
        return $this->category->all();
    }

    /**
     * Increments the category's article count by 1.
     *
     * @param $categoryId
     */
    public function increment($categoryId)
    {
        DB::statement('UPDATE '.$this->category->getTable().' SET article_count = article_count + 1 WHERE id = '.$categoryId);
    }

    /**
     * Decrements the category's article count by 1.
     *
     * @param $categoryId
     */
    public function decrement($categoryId)
    {
        DB::statement('UPDATE '.$this->category->getTable().' SET article_count = article_count - 1 WHERE id = '.$categoryId);
    }
}
