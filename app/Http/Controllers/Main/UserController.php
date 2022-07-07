<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\User\Message\StoreMessageRequest;
use App\Jobs\SendUserMessageEmailJob;
use App\Mail\SendUserMessageEmail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('main.user.index', ['users' => $users]);
    }

    public function show(string $slug) {
        $user = User::where('slug', $slug)->first();
        $photos = $user->photos;
        return view('main.user.show', ['photos' => $photos, 'user' => $user]);
    }

    public function storeMessage(StoreMessageRequest $request, string $slug) {
        $data = $request->validated();
        $message = $data['user-message'];
        $userReceiver = User::query()->where('slug', $slug)->first();
        $userSender = User::find(auth()->user()->id);
        SendUserMessageEmailJob::dispatch($message, $userReceiver, $userSender);

        return redirect()->route('main.user.show', $userReceiver->slug);
    }
}
