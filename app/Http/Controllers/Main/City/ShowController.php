<?php

namespace App\Http\Controllers\Main\City;

use App\Http\Controllers\Controller;
use App\Models\City;

class ShowController extends Controller
{
    public function show(string $slug) {
        $city = City::where('slug', $slug)->first();
        $users = $city->users;
        return view('main.city.show', ['users' => $users, 'city' => $city]);
    }
}
