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

    public function getReviewId()
    {
        return $this->reviewId;
    }

    public function getAuthorId()
    {
        return $this->authorId;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getContent()
    {
        return $this->content;
    }
}
 