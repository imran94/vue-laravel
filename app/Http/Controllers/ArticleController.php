<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index() {
        return Article::all();
    }

    public function show(Article $article) {
        return $article;
    }

    public function store(Request $request) {
        $article = Article::create($request->all());
        return response()->json($article, 201);
    }

    public function update(Request $request, $id) {
        $article = Article::findOrFail($id);
        $article->update($request->all());
        return $article;
    }

    public function delete($id) {
        return Article::find($id)->delete();
    }
}
