<?php
namespace FinerThings\Domain\Articles\Data;

use Illuminate\Support\Facades\Redis;

class RedisArticlesRepository
{
    public function __construct()
    {
        $this->redis = Redis::connection();
    }

    /**
     * Creates the data necessary for a new article.
     *
     * @param integer $articleId
     * @param string $category
     * @param string $title
     * @param string $content
     */
    public function create($articleId, $category, $title, $content)
    {
        $this->redis->pipeline(function($pipe) use ($articleId, $category, $title, $content) {
            $pipe->lpush('articles', $articleId);
            $pipe->hmset("article:$articleId", compact($category, $title, $content));
        });
    }

    /**
     * Update an existing article.
     *
     * @param integer $articleId
     * @param string $category
     * @param string $title
     * @param string $content
     */
    public function update($articleId, $category, $title, $content)
    {
        $this->redis->hmset("article:$articleId", compact($category, $title, $content));
    }

    /**
     * Publishes an existing article. This basically makes it visible to the public.
     *
     * @param $articleId
     */
    public function publish($articleId)
    {
        $this->redis->lpush('articles.published', $articleId);
    }
}
