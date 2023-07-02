<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Like;
use App\Models\Bad;

class post extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        //1つの投稿に対していいねは複数あるから1対多の1の方に記述投稿側
        return $this->hasMany('App\Models\Like');
    }

    public static function deletePost($postId)
    {
        self::where('id', $postId)->delete();
    }

    public function bads()
    {
        return $this->hasMany(Bad::class);
    }

} 