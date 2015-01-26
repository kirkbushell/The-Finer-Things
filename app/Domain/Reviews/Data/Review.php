<?php
namespace FinerThings\Domain\Reviews\Data;

use Carbon\Carbon;
use FinerThings\Domain\Categories\Category;
use FinerThings\Domain\Reviews\AuthorId;
use FinerThings\Domain\Reviews\ReviewId;

/**
 * Class Review
 *
 * @Entity
 * @Table(name="reviews",indexes={@Index(name="title_idx", columns={"title"}), @Index(name="published_idx", columns={"published_at"})})
 * @package FinerThings\Domain\Reviews
 */
class Review
{
    /**
     * @Column(type="string", length=36, unique=true, nullable=false)
     * @var ReviewId
     */
    private $id;

    /**
     * @Column(type="string", nullable=false)
     * @var Category
     */
    private $category;

    /**
     * @Column(type="string", unique=true, nullable=false)
     * @var string
     */
    private $title;

    /**
     * @Column(type="string", length=36, nullable=false)
     * @var string
     */
    private $authorId;

    /**
     * @Column(type="text")
     * @var string
     */
    private $content;

    /**
     * @Column(name="scheduled_for", type="datetime")
     * @var datetime
     */
    private $scheduledFor;

    /**
     * @Column(name="published_at", type="datetime")
     * @var datetime
     */
    private $publishedAt;

    /**
     * @param ReviewId $id
     * @param AuthorId $authorId
     * @param Category $category
     * @param string $title
     */
    public function __construct(ReviewId $id, AuthorId $authorId, $category, $title)
    {
        $this->id = $id;
        $this->authorId = $authorId;
        $this->category = $category;
        $this->title = $title;
    }

    /**
     * @return ReviewId
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @param $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function title()
    {
        return $this->title;
    }

    /**
     * @param $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function content()
    {
        return $this->content;
    }

    /**
     * @return AuthorId|string
     */
    public function authorId()
    {
        return $this->authorId;
    }

    /**
     * @param Carbon $dateTime
     */
    public function scheduledFor(Carbon $dateTime)
    {
        $this->scheduledFor = $dateTime;
    }
}
