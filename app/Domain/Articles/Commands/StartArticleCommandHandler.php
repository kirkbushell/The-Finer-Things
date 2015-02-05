<?php
namespace FinerThings\Domain\Articles\Commands;

use FinerThings\Domain\Articles\Data\Articles;

class StartArticleCommandHandler
{
    private $articles;

    public function __construct(Articles $articles)
    {
        $this->articles = $articles;
    }

    /**
     * Create a new article object and persist to the data store.
     *
     * @param StartArticleCommand $command
     */
    public function handle(StartArticleCommand $command)
    {
        $article = new Article;
        $article->categoryId = $command->categoryId;
        $article->title = $command->title;
        $article->excerpt = $command->excerpt;
        $article->content = $command->content;

        $this->repository->save($article);
    }
}
