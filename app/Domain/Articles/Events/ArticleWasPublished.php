<?php
namespace FinerThings\Domain\Articles\Events;

class ArticleWasPublished
{
    public $article;

    function __construct(Article $article)
    {
        $this->article = $article;
    }
}
