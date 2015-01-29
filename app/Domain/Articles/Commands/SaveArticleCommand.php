<?php
namespace FinerThings\Domain\Articles\Commands;

use FinerThings\Domain\Articles\AuthorId;
use FinerThings\Domain\Articles\ArticleId;

class SaveArticleCommand
{
    private $authorId;
    private $category;
    private $title;
    private $content;
    private $articleId;

    public function __construct($articleId, $authorId, $category, $title, $content)
    {
        $this->articleId = new ArticleId($articleId);
        $this->authorId = new AuthorId($authorId);
        $this->category = $category;
        $this->title = $title;
        $this->content = $content;
    }

    public function getArticleId()
    {
        return $this->articleId;
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
 