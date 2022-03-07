<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        $photos = Photo::paginate(15);
//        $likedPhotos = Photo::query()->withCount('likedUsers')->orderBy('liked_users_count', 'desc')->get();
        return view('main.index', ['photos' => $photos]);
    }
}
