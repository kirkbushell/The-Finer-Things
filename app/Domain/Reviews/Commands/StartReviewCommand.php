<?php
namespace FinerThings\Domain\Reviews\Commands;

use FinerThings\Domain\Reviews\AuthorId;

class StartReviewCommand
{
    private $title;
    private $category;
    private $authorId;

    function __construct($authorId, $category, $title)
    {
        $this->authorId = new AuthorId($authorId);
        $this->category = $category;
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function category()
    {
        return $this->category;
    }

    /**
     * @return mixed
     */
    public function title()
    {
        return $this->title;
    }

    public function authorId()
    {
        return $this->authorId;
    }
}
