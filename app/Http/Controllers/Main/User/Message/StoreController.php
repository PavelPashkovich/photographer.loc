<?php

namespace App\Http\Controllers\Main\User\Message;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\User\Message\StoreMessageRequest;
use App\Mail\SendUserMessageEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class StoreController extends Controller
{
    public function store(StoreMessageRequest $request) {
        $data = $request->validated();
        $userMessage = $data['user-message'];
        $user = User::query()->find($data['user_id']);
        $email = $user->email;
        Mail::to($email)->send(new SendUserMessageEmail($userMessage, $user));
        return redirect()->back();
    }
}
