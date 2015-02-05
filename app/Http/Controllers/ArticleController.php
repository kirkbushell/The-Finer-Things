<?php
namespace FinerThings\Http\Controllers;

use FinerThings\Domain\Articles\Commands\StartArticleCommand;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Http\Request;

/**
 * Class ArticleController
 *
 * @package FinerThings\Http\Controllers
 */
class ArticleController extends Controller
{
    use DispatchesCommands;

    /**
     * @Get("submit", as="article.create", middleware={"auth"})
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * @Post("submit", as="article.store", middleware={"auth"})
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function store(Request $request)
    {
        $this->dispatch(new StartArticleCommand(
            $request->user()->id,
            $request->get('category'),
            $request->get('title'),
            $request->get('excerpt'),
            $request->get('content')
        ));

        return view('article.store');
    }
}
