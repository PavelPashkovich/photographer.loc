<?php

namespace App\Http\Controllers\Main\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class IndexController extends Controller
{
    public function index() {
        $users = User::all();
        return view('main.user.index', ['users' => $users]);
    }
}
