<?php
namespace FinerThings\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    use DispatchesCommands;

    /**
     * @Get("submit", as="article.create")
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * @Post("submit", as="article.store")
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function store(Request $request)
    {
        $this->dispatchFrom(StartArticleCommand::class, $request);

        return view('article.store');
    }
}
