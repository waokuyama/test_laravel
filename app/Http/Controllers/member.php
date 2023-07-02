<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\DB;
use App\Models\Chirp;
use App\Models\User;
use App\Models\Post;
use App\Models\Like;
use App\Models\Contact;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;  //今追加したやつ
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
        $userId = Auth::id(); // ログインユーザーのIDを取得
        // dd($userId );


        $users = User::join('posts', 'users.id', '=', 'posts.user_id')
            ->select('posts.id','users.name', 'posts.title','posts.article','posts.genre','posts.created_at') 
            ->where('posts.user_id', '!=', $userId) 
            ->orderBy('posts.created_at', 'desc') // 投稿日で降順ソート          
            ->paginate(5);
        return view('members.browse',['user' => $users]);
    }

    //ジャンル別値の取得
    public function member_genre($name)
    {
        $users = User::join('posts', 'users.id', '=', 'posts.user_id')
            ->select('posts.id','users.name', 'posts.title','posts.article','posts.genre','posts.created_at')  
            ->where('posts.genre', $name)  
            ->orderBy('posts.created_at', 'desc') // 投稿日で降順ソート  
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
        $posts = Post::where('user_id', $userId)
                 ->withCount('likes')
                 ->orderBy('posts.created_at', 'desc')              
                 ->paginate(5);
        return view('members.mypost',['members' => $posts]);
    }

    //自分の投稿一覧ジャンル別取得
    public function mypost_genre($name)
    {
        // dd($name);
        $userId = Auth::id();
        $posts = Post::where('user_id', $userId)
                 ->withCount('likes')
                 ->where('posts.genre', $name)
                 ->orderBy('posts.created_at', 'desc')
                 ->paginate(5);
        return view('members.mypost',['members' => $posts]);
    }

    //投稿削除
    public function member_delete($id)
    {
        Post::deletePost($id);
        return redirect::route('member_mypost');
    }

    //管理者が投稿削除
    public function admin_delete($id)
    {
        Post::deletePost($id);
        return redirect::route('admin_bad');
    }


    //お問い合わせページ
    public function member_form()
    {
        $user = Auth::user(); 
        return view('members.form',['user' => $user]);
    }

    //管理者トップページ
    // 管理者トップページ
public function admin_top()
{
    $today = date('Y-m-d');

    $statusCounts = DB::table('contacts')
        ->select('status', DB::raw('COUNT(*) as total'))
        ->whereDate('created_at', $today)
        ->groupBy('status')
        ->get();

    $countByStatus = [];
    foreach ($statusCounts as $statusCount) {
        $countByStatus[$statusCount->status] = $statusCount->total;
    }
    //ここでContactモデルのインスタンスを取得しメソッドの実行：今日のお問い合わせ合計件数
    $contact = new Contact;
    $month_totle = $contact->month_totle();


    //今月のお問い合わせの中で一番多かった日と件数の取得、日付だけの形式に変更
    $month_max = $contact->month_max();
    $month_max->date = date('d', strtotime($month_max->date));
    // dd($month_max );
    

    //1週間ごとのお問い合わせ数と日付の取得
    $week_date = $contact->week_date();
    // dd($week_date);
     $total = [];
     $day = [];
     foreach ($week_date as $data){
        $total[] = $data->total;
        $day[] = $data->day;
     }
    //  dd($total);
    //  dd($day);

    return view('admin.dashboard', ['status' => $countByStatus, 'month_totle' => $month_totle, 'month_max' => $month_max, 'week_total' => $total, 'week_day' => $day]);
}



    //管理者報告ページ
    public function admin_report()
    {     
        return view('admins.report');
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


    public function member_like()
    {
        $userId = Auth::id();
        $likedPostIds = Like::where('user_id', $userId)->pluck('post_id');
        $likedPosts = Post::whereIn('id', $likedPostIds)
        ->select('id', 'title', 'article', 'genre', 'created_at')
        ->paginate(10);
        return view('members.like', ['likedPosts' => $likedPosts]);
    }

}
