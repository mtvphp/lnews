<?php

namespace App\Http\Controllers\Manager;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManagerController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(10);

        $news = News::orderBy('id', 'DESC')->paginate(3, '*', 'list');

        return view('manager.index', [
            'categories' => $categories,
            'news' => $news
        ]);
    }
}
