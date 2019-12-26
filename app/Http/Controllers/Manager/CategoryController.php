<?php

namespace App\Http\Controllers\Manager;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
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
        return view('manager.category.create');
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
            'title' => 'required|min:4|unique:categories',
            'order' => 'required|numeric'
        ];

        $this->validate($request, $rules);

        Category::create([
            'title' => $request->title,
            'order' => $request->order
        ]);

        return redirect()->route('manager')->with('success', 'Category successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        if($category) {
            $news = News::orderBy('id',  'DESC')->where('category_id', '=',  $category->id)->paginate(3, '*', 'foo');

            return view('manager.category.show', [
                'category' => $category,
                'news' => $news,
                'categories' => Category::orderBy('order')->get()
            ]);
        }

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        if($category) {
            return view('manager.category.edit', [
                'category' => $category
            ]);
        }
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        if($category) {
            $old = $category->title;

            $this->validate($request, [
                'title' => 'required|min:4',
                'order' => 'required|numeric'
            ]);

            $category->update([
                'title' => $request->title,
                'order' => $request->order
            ]);

            return redirect()->route('manager')->with('success', 'Category ' . $old . ' edited to ' . $category->title);
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category) {
            $category->delete();

        }

        return back();
    }
}
