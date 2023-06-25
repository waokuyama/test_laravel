<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
// use Illuminate\Support\Facades\Auth;
use Auth;

class LikeController extends Controller
{
        public function store($postId)
        {
            Auth::user()->like($postId);
            // return 'なんで';
            // dd($postId);
        }
}

