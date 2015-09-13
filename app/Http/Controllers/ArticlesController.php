<?php

namespace App\Http\Controllers;

use App\Article;
//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Request;

class ArticlesController extends Controller
{
    public function create()
    {
        return view('articles.create');
    }

    public function store()
    {
        $input = Request::all();
        Article::create($input);
        return redirect('articles');
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }
}
