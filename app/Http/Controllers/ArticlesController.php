<?php

namespace App\Http\Controllers;

use App\Article;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;


class ArticlesController extends Controller
{
    public function create()
    {
        return view('articles.create');
    }

    public function store(Requests\ArticleRequest $request)
    {

        Article::create($request->all());
        return redirect('articles');
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }
}
