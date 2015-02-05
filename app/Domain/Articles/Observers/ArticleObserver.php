<?php
namespace FinerThings\Domain\Articles\Observers;

use FinerThings\Domain\Articles\Data\Article;
use FinerThings\Domain\Categories\Data\Categories;

class ArticleObserver
{
    private $oldCategoryId;
    private $categories;

    function __construct(Categories $categories)
    {
        $this->categories = $categories;
    }

    public function created(Article $article)
    {
        $this->categories->increment($article->categoryId);
    }

	public function updating(Article $article)
    {
        $this->oldCategoryId = $article->getOriginal('category_id');
    }

    public function updated(Article $article)
    {
        if ($this->oldCategoryId != $article->categoryId) {
            $this->categories->increment($article->categoryId);
            $this->categories->decrement($this->oldCategoryId);
        }
    }

    public function deleted(Article $article)
    {
        $this->categories->decrement($article->categoryId);
    }
}
