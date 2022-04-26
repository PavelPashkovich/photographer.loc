<?php

namespace App\Http\Controllers\Main\Photo;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function index(Photo $photo) {
        $date = Carbon::parse($photo->created_at);
        $comments = $photo->comments()->get();
        if ($photo->user->photos()->where('id', '!=', $photo->id)->count() >= 3) {
            $relatedPhotos = $photo->user->photos()->where('id', '!=', $photo->id)->get()->random(3);
        } else {
            $relatedPhotos = $photo->user->photos()->where('id', '!=', $photo->id)->get();
        }

        return view('main.photo.index', [
            'photo' => $photo,
            'relatedPhotos' => $relatedPhotos,
            'date' => $date,
            'comments' => $comments]);
    }
}
