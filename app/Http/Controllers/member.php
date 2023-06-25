<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use App\Models\User;
use App\Models\Post;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class member extends Controller
{
    // public function test5(Request $request)
    // {
        
    //     dd($request->user());
        
    //     return view('members.dashboard', [
    //          'test' => $request
    //     ]);
    // }

    public function test5()
    {
        $user = Auth::user();
        return view('members.dashboard',['user' => $user]);
    }


    public function member_top()
    {
        return view('members.top');
    }

    // 会員トップページ
    public function member_top1()
    {
        $user = Auth::user();
        // dd($user);
        return view('members.dashboard',['user' => $user]);
        
    }

    //マイページ 意味わからんけどprofile.editにあるマイページ
    public function member_mypage()
    {
        return view('members.mypage');
    }

    //投稿ページ
    public function member_post()
    {
        $user = Auth::user(); 
        return view('members.post1',['user' => $user]);
    }
    //投稿内容
    public function report_post(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'message' => 'required',
            'category' => 'required',
        ]);
        // dd($request);
        $user = Auth::user(); 
        //データの保存
        $post = new User;
        $post->setTable('posts');
        $post->title = $validatedData['title'];
        $post->article = $validatedData['message'];
        $post->user_id = $user->id;
        // $post->user_id = auth()->id();　こっちの方が良さそう
        $post->genre = $validatedData['category'];
        $post->save(); 


        //ルートのmember_mypostを実行させる
        return Redirect::route('member_mypost');
    }

    //閲覧ページ
    // public function member_browse()
    // {
    //     $user = Auth::user(); 
    //     return view('members.browse',['user' => $user]);
    // }

    //観覧ページ　
    public function member_browse()
    {
        $users = User::join('posts', 'users.id', '=', 'posts.user_id')
            ->select('users.name', 'posts.title','posts.article','posts.genre','posts.created_at')
            ->paginate(5);
        return view('members.browse',['user' => $users]);
    }

    //フレンド一覧ページ
    public function member_friend()
    {
        $user = Auth::user(); 
        return view('members.friends',['user' => $user]);
    }

    //自分の投稿一覧ページ
    public function member_mypost()
    {
        $userId = Auth::id();
        // dd($userId);
        $posts = Post::where('user_id', $userId)
                 ->withCount('likes')
                 ->paginate(5);
        return view('members.mypost',['members' => $posts]);
    }



    //お問い合わせページ
    public function member_form()
    {
        $user = Auth::user(); 
        return view('members.form',['user' => $user]);
    }

    //管理者トップページ
    public function admin_top()
    {
        return view('admin.dashboard');
    }

    //管理者お問い合わせ一覧ページ
    public function admin_inquiry()
    {
        return view('admins.inquiry');
    }

    //管理者報告ページ
    public function admin_report()
    {
        return view('admins.report');
    }

    //管理者bad一覧ページ
    public function admin_bad()
    {
        return view('admins.bad');
    }




    //テスト用
    public function test()
    {
        return view('members.test');
    }


    //テスト用終わり
    public function toggleLike($id)
    {
        $post = Post::find($id);
        
        if (!$post) {
            return response()->json(['error' => 'Post not found.'], 404);
        }
        
        $user = Auth::user();
        
        if ($user->likes()->where('post_id', $post->id)->exists()) {
            $user->likes()->detach($post);
            $liked = false;
        } else {
            $user->likes()->attach($post);
            $liked = true;
        }
        
        return response()->json(['liked' => $liked]);
    }



    
}
