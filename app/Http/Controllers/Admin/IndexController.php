<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Photo;
use App\Models\User;

class IndexController extends Controller
{
    public function index() {
        $data = [
            'usersCount' => User::all()->count(),
            'photosCount' => Photo::all()->count(),
            'categoriesCount' => Category::all()->count(),
            'citiesCount' => City::all()->count(),
        ];
        return view('admin.main.index', compact('data'));
    }
}
