<?php
namespace FinerThings\Domain\Reviews\Commands;

class StartReviewCommand
{
    private $title;
    private $category;
    private $authorId;
    private $content;

    function __construct($authorId, $category, $title, $content)
    {
        $this->authorId = $authorId;
        $this->category = $category;
        $this->title = $title;
        $this->content = $content;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getAuthorId()
    {
        return $this->authorId;
    }
}
