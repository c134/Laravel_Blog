<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(ArticleRequest $request)
    {
        if ($request->hasFile('file')) {

            $file = Input::file('file');
            $imgTitle = $request->title;
            $imagePath = 'uploads/' . $imgTitle . '.jpg';
            $request->image_path = $imagePath;

            Article::create(array('title' => $request->title,
                'body' => $request->body,
                'image_path' => $imagePath));

            Image::make($file)->resize(300, 200)->save($imagePath);
        }

    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }
}
