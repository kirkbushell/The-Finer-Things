<?php
namespace FinerThings\Domain\Articles\Events;

class ArticleWasSaved
{
    public $article;

    function __construct(Article $article)
    {
        $this->article = $article;
    }
}
 