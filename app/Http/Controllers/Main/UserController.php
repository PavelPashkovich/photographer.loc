<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\User\Message\StoreMessageRequest;
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

    public function storeMessage(StoreMessageRequest $request) {
        $data = $request->validated();
        $userMessage = $data['user-message'];
        $user = User::query()->find($data['user_id']);
        $email = $user->email;
        Mail::to($email)->send(new SendUserMessageEmail($userMessage, $user));
        return redirect()->back();
    }
}
