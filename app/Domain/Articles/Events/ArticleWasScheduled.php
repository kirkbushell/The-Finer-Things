<?php
namespace FinerThings\Domain\Articles\Events;

class ArticleWasScheduled
{
    public $article;

    function __construct(Article $article)
    {
        $this->article = $article;
    }
}
 