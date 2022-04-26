<?php

namespace App\Http\Controllers\Main\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class ShowController extends Controller
{
    public function show($id) {
        $user = User::find($id);
        $photos = $user->photos;
        return view('main.user.show', ['photos' => $photos, 'user' => $user]);
    }
}
