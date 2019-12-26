<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $news = News::orderBy('id', 'DESC')->paginate(3, '*', 'foo');
        $categories = Category::orderBy('order')->get();

        return view('home', [
            'news' => $news,
            'categories' => $categories
        ]);
    }
}
