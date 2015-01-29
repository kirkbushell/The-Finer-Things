<?php
namespace spec\FinerThings\Domain\Articles;

use FinerThings\Domain\Articles\AuthorId;
use FinerThings\Domain\Articles\Article;
use FinerThings\Domain\Articles\ArticleId;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ArticleSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedThrough('start', [new AuthorId(1), 'Category', 'Title', 'Content']);
        $this->shouldHaveType(Article::class);
    }

    function it_should_provide_getters()
    {
        $this->beConstructedThrough('start', [new AuthorId(1), 'Category', 'Title', 'Content']);
        $this->getArticleId()->shouldHaveType(ArticleId::class);
    }
}
