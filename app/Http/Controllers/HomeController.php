<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $news = News::orderBy('id', 'DESC')->paginate(4, '*', 'foo');
        $categories = Category::all();

        return view('home', [
            'news' => $news,
            'categories' => $categories
        ]);
    }
}
