<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('main.category.index', ['categories' => $categories]);
    }

    public function show(string $slug) {
        $category = Category::where('slug', $slug)->first();
        $photos = $category->photos;
        return view('main.category.show', ['photos' => $photos]);
    }
}
