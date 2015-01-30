<?php
namespace FinerThings\Domain\Categories;

use Illuminate\Support\Str;

class Category
{
    private $title;
    private $categoryId;

    /**
     * @param string $title
     */
    public function __construct(CategoryId $categoryId, $title)
    {
        $this->categoryId = $categoryId;
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getCategoryId()
    {
        return $this->categoryId;
    }

    public function getSlug()
    {
        return Str::slug($this->getTitle());
    }

    public function __toString()
    {
        return $this->getTitle();
    }
}
