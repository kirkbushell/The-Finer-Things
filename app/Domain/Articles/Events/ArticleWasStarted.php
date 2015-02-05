<?php
namespace FinerThings\Domain\Articles\Events;

class ArticleWasStarted
{
    public $article;

    function __construct(Article $article)
    {
        $this->article = $article;
    }
}
 