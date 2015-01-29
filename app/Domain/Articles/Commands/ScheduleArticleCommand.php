<?php
namespace FinerThings\Domain\Articles\Commands;

use Carbon\Carbon;
use FinerThings\Domain\Articles\ArticleId;

class ScheduleArticleCommand
{
    private $articleId;
    private $dateTime;

    function __construct($articleId, $dateTime)
    {
        $this->articleId = new ArticleId($articleId);
        $this->dateTime = new Carbon($dateTime);
    }

    /**
     * @return Carbon
     */
    public function dateTime()
    {
        return $this->dateTime;
    }

    /**
     * @return ArticleId
     */
    public function articleId()
    {
        return $this->articleId;
    }
}
