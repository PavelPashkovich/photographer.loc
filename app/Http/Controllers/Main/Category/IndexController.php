<?php

namespace App\Http\Controllers\Main\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('main.category.index', ['categories' => $categories]);
    }
}
