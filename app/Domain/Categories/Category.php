<?php
namespace FinerThings\Domain\Categories;

use Illuminate\Support\Str;

class Category
{
    /**
     * @var string
     */
    private $title;

    /**
     * @param string $title
     */
    public function __construct($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function title()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function slug()
    {
        return Str::slug($this->title());
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->title();
    }
}
