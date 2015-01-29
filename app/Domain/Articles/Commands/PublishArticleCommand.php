<?php
namespace FinerThings\Domain\Articles\Commands;

use FinerThings\Domain\Articles\ArticleId;

class PublishArticleCommand
{
    private $articleId;

    function __construct($articleId)
    {
        $this->articleId = new ArticleId($articleId);
    }

    public function getArticleId()
    {
        return $this->articleId;
    }
}
 