<?php

namespace App\Http\Controllers;

use App\Article;
use Carbon\Carbon;
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
            $request->published_at = Carbon::now();
            Article::create(array('title' => $request->title,
                'body' => $request->body,
                'image_path' => $imagePath, 'published_at' => $request->published_at));

            Image::make($file)->resize(300, 200)->save($imagePath);

            return redirect('articles')->with([
                'flash_message' => 'Your article has been created',
                'flash_message_important' => true
            ]);
        } else {
            $url = 'https://ajax.googleapis.com/ajax/services/search/images?v=1.0&rsz=1&q=' . $request->title;
            $url = file_get_contents($url);
            $file = json_decode($url);
            $file = $file->responseData->results[0]->url;
            $imgTitle = $request->title;
            $imagePath = 'uploads/' . $imgTitle . '.jpg';
            $request->image_path = $imagePath;
            $request->published_at = Carbon::now();
            Article::create(array('title' => $request->title,
                'body' => $request->body,
                'image_path' => $imagePath, 'published_at' => $request->published_at));

            Image::make($file)->resize(300, 200)->save($imagePath);

            return redirect('articles')->with([
                'flash_message' => 'Your article has been created',
                'flash_message_important' => true
            ]);
        }

    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Article $article, ArticleRequest $request)
    {
        $article->update($request->all());
        return redirect('articles');
    }

    public function destroy($id) {

        $article = Article::findOrFail($id);
        $article->delete();
        return redirect('articles');
    }




}