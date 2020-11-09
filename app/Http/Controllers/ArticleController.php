<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');
        $articles = $q ? Article::where('name', 'like', "%{$q}%")->paginate() : Article::paginate();
        // $articles = Article::paginate();
        return view('article.index', compact('articles', 'q'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));
    }

    public function create()
    {
        $article = new Article();
        return view('article.create', compact('article'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|unique:articles',
            'body' => 'required|min:10',
        ]);

        $article = new Article();
        $article->fill($data);

        $article->save();
        $request->session()->flash('status', 'Task was successful!');
        return redirect()
            ->route('articles.index');
    }
}
