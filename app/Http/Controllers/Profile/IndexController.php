<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        $photosCount = auth()->user()->photos->count();
        $commentsCount = auth()->user()->comments->count();
        $likesCount = auth()->user()->likedPhotos->count();

        return view('profile.main.index', [
            'photosCount' => $photosCount,
            'commentsCount' => $commentsCount,
            'likesCount' => $likesCount,
        ]);
    }
}
