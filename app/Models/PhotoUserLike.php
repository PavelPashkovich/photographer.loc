<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoUserLike extends Model
{
    use HasFactory;

    protected $table = 'photo_user_likes';
    protected $guarded = false;
}
