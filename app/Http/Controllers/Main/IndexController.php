<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Photo;

class IndexController extends Controller
{
    public function index() {

        $photos = Photo::query()->inRandomOrder()->paginate(15);
        return view('main.index', ['photos' => $photos]);
    }
}
