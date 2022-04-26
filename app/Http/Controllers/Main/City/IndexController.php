<?php

namespace App\Http\Controllers\Main\City;

use App\Http\Controllers\Controller;
use App\Models\City;

class IndexController extends Controller
{
    public function index() {
        $cities = City::all();
        return view('main.city.index', ['cities' => $cities]);
    }
}
