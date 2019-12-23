<?php

namespace App\Http\Controllers\Manager;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('manager.news.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|min:4|unique:news',
            'description' => 'required|min:12',
            'category_id' => 'required|numeric'
        ];

        $this->validate($request, $rules);

        News::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'author' => Auth::user()->id
        ]);

        return redirect()->route('manager')->with('success', 'News successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        if($news) {
            $categories = Category::all();

            return view('manager.news.show', [
                'news' => $news,
                'categories' => $categories
            ]);
        }

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        if($news) {
            $categories = Category::all();

            return view('manager.news.edit', [
                'news' => $news,
                'categories' => $categories
            ]);
        }
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        if($news) {
            $this->validate($request, [
                'title' => 'required|min:4',
                'description' => 'required|min:12',
                'category_id' => 'numeric|required'
            ]);

            $news->update([
                'title' => $request->title,
                'description' => $request->description,
                'category_id' => $request->category_id
            ]);

            return redirect()->route('manager')->with('success', 'News successfully edited');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        if($news) {
            $news->delete();
        }

        return back();
    }
}
