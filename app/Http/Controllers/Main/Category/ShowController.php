<?php

namespace App\Http\Controllers\Main\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function show(string $slug) {
        $category = Category::where('slug', $slug)->first();
        $photos = $category->photos;
        return view('main.category.show', ['photos' => $photos]);
    }
}
