<?php

namespace App\Http\Controllers\Main\Photo\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\Photo\Comment\StoreCommentRequest;
use App\Mail\SendPhotoCommentEmail;
use App\Models\Comment;
use App\Models\Photo;
use Illuminate\Support\Facades\Mail;

class StoreController extends Controller
{
    public function store(StoreCommentRequest $request, string $slug) {
        $photo = Photo::where('slug', $slug)->first();
        $data = $request->validated();
        $data['photo_id'] = $photo->id;
        $data['user_id'] = auth()->user()->id;
        $email = $photo->user->email;
        $comment = Comment::create($data);
        $commentMessage = $comment->comment;
        Mail::to($email)->send(new SendPhotoCommentEmail($photo, $commentMessage));
        return redirect()->route('main.photo.index', $photo->slug);
    }
}
