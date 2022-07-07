<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\Photo\Comment\StoreCommentRequest;
use App\Jobs\SendPhotoCommentEmailJob;
use App\Mail\SendPhotoCommentEmail;
use App\Models\Comment;
use App\Models\Photo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class PhotoController extends Controller
{
    public function index(string $slug) {
        $photo = Photo::where('slug', $slug)->first();
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

    public function storeComment(StoreCommentRequest $request, string $slug) {
        $photo = Photo::where('slug', $slug)->first();
        $data = $request->validated();
        $data['photo_id'] = $photo->id;
        $data['user_id'] = auth()->user()->id;
        $user = User::find(auth()->user()->id);
        $comment = Comment::create($data);
        $commentMessage = $comment->comment;
        SendPhotoCommentEmailJob::dispatch($photo, $commentMessage, $user);

        return redirect()->route('main.photo.index', $photo->slug);
    }

    public function storeLike(string $slug) {
        $photo = Photo::where('slug', $slug)->first();
        auth()->user()->likedPhotos()->toggle($photo->id);
        return redirect()->back();
    }
}
