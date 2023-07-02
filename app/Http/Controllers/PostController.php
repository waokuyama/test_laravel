<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB; 

class PostController extends Controller
{
        //管理者bad一覧ページ
        // public function admin_bad()
        // {
        //         $posts = Post::withCount('bads')->paginate(30);
        //         return view('admins.bad', ['posts' => $posts]);
        // }
        public function admin_bad()
        {
        $posts = Post::leftJoin('bads', 'posts.id', '=', 'bads.post_id')
                ->select('posts.*', DB::raw('COUNT(bads.id) as bad_count'))
                ->groupBy('posts.id')
                ->orderBy('bad_count', 'desc')
                ->paginate(30);
        // dd($posts);

        return view('admins.bad', ['posts' => $posts]);
        }

}
