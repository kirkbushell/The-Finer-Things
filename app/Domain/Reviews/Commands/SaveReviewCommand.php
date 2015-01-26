<?php
namespace FinerThings\Domain\Reviews\Commands;

use FinerThings\Domain\Reviews\AuthorId;
use FinerThings\Domain\Reviews\ReviewId;

class SaveReviewCommand
{
    private $authorId;
    private $category;
    private $title;
    private $content;
    private $reviewId;

    public function __construct($reviewId, $authorId, $category, $title, $content)
    {
        $this->reviewId = new ReviewId($reviewId);
        $this->authorId = new AuthorId($authorId);
        $this->category = $category;
        $this->title = $title;
        $this->content = $content;
    }

    public function id()
    {
        return $this->reviewId;
    }

    /**
     * @return mixed
     */
    public function authorId()
    {
        return $this->authorId;
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
    public function content()
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function title()
    {
        return $this->title;
    }
}
 