<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Http\Requests\NewsCreateRequest;
use App\Http\Requests\NewsUpdateRequest;
use Illuminate\Support\Facades\Gate;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $newsArticles = News::whereNotNull('published_at')->orderBy('published_at', 'desc')->get();

        return view('news.index', compact('newsArticles'));
    }

    /**
     * Show news create form
     *
     * @return View news create page
     */
    public function create()
    {
        return view('news.create');
    }

     /**
     * To store news information
     *
     * @param NewsCreateRequest $request request with inputs
     * @return View home page
     */
    public function store(NewsCreateRequest $request)
    {
        News::create($request->all());

        return redirect()->route('home')->with('success', 'News added successfully!');
    }

    /**
     * To show product detail information
     *
     * @param  $news News Model
     * @return $news News Object
     */
    public function show(News $news)
    {
        return view('news.show',compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        if (! Gate::allows('update-news', $news)) {
            abort(404);
        }

        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsUpdateRequest $request, News $news)
    {
        $news->update($request->all());

        return redirect()->route('news.show', $news)->with('success', 'News updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        if (! Gate::allows('delete-news', $news)) {
            abort(404);
        }

        optional($news)->delete();

        return redirect()->route('home')->with('success', 'News deleted successfully!');
    }
}
