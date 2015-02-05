<?php
namespace FinerThings\Domain\Articles\Data;

class Articles
{
    private $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function published()
    {
        return $this->article->paginate();
    }

	public function save(Article $article)
    {
        return $article->save();
    }
}
