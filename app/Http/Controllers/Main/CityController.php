<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\City;

class CityController extends Controller
{
    public function index() {
        $cities = City::all();
        return view('main.city.index', ['cities' => $cities]);
    }

    public function show(string $slug) {
        $city = City::where('slug', $slug)->first();
        $users = $city->users;
        return view('main.city.show', ['users' => $users, 'city' => $city]);
    }
}
