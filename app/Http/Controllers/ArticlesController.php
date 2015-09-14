<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class ArticlesController extends Controller
{
    public function index(){
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }
    public function create()
    {
        return view('articles.create');
    }

    public function store(ArticleRequest $request)
    {
        Article::create($request->all());
        return redirect('articles');
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }
}
