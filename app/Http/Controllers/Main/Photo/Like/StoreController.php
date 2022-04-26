<?php

namespace App\Http\Controllers\Main\Photo\Like;

use App\Http\Controllers\Controller;
use App\Models\Photo;

class StoreController extends Controller
{
    public function store(Photo $photo) {
        auth()->user()->likedPhotos()->toggle($photo->id);
        return redirect()->back();
    }
}
