<?php
namespace FinerThings\Domain\Articles\Commands;

class StartArticleCommand
{
    public $title;
    public $category;
    public $authorId;
    public $content;
    public $excerpt;

    function __construct($authorId, $categoryId, $title, $excerpt, $content)
    {
        $this->authorId = $authorId;
        $this->category = $categoryId;
        $this->title = $title;
        $this->content = $content;
        $this->excerpt = $excerpt;
    }
}
