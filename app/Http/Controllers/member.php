<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use App\Models\User;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class member extends Controller
{
    public function test5(Request $request)
    {
        
        // dd($request->user());
        
        return view('members.dashboard', [
             'test' => $request
        ]);
    }

    public function member_top()
    {
        return view('members.top');
    }

    // 会員トップページ
    public function member_top1()
    {
        return view('members.dashboard');
    }

    //マイページ profile/editにある？意味わからん
    public function member_mypage()
    {
        return view('members.mypage');
    }

    //投稿ページ
    public function member_post(Request $request)
    {
        // 'user_id' => $request->id,
        $input = $request->all();
        return view('members.post1',[
            
            'user_id' => $request->id,
        ]);
    }

    //閲覧ページ
    public function member_browse()
    {
        return view('members.browse');
    }

    //フレンド一覧ページ
    public function member_friend()
    {
        return view('members.friends');
    }

    //自分の投稿一覧ページ
    public function member_mypost()
    {
        return view('members.mypost');
    }

    //お問い合わせページ
    public function member_form()
    {
        return view('members.form');
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
