<?php

namespace App\Http\Controllers\Main\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class ShowController extends Controller
{
    public function show(string $slug) {
        $user = User::where('slug', $slug)->first();
        $photos = $user->photos;
        return view('main.user.show', ['photos' => $photos, 'user' => $user]);
    }
}
