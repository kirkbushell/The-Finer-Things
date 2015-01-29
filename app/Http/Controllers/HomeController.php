<?php
namespace FinerThings\Http\Controllers;

class HomeController extends Controller
{
    /**
     * @Get("/", as="home")
     */
	public function index()
    {
        return view('home.index');
    }
}
