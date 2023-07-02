<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bad; // 必要な場所に適切にインポートする
use App\Models\Post;
use App\Models\Like;
// use Illuminate\Support\Facades\Auth;
use Auth;

class LikeController extends Controller
{
    public function store($postId)
    {
        Auth::user()->like($postId);
    }

    

    public function bad($buttonId)
    {
        $userId = Auth::id();

        // BadテーブルにユーザーIDと投稿IDの組み合わせで検索し、該当のレコードを取得
        $existingBad = Bad::where('user_id', $userId)
            ->where('post_id', $buttonId)
            ->first();

        if ($existingBad) {
            // レコードが存在する場合は削除
            $existingBad->delete();

            return response()->json(['message' => 'Bad 登録が削除されました']);
        } else {
            // レコードが存在しない場合は新規登録
            $bad = Bad::create([
                'user_id' => $userId,
                'post_id' => $buttonId,
            ]);

            // リレーションの設定により、Badモデルと関連するモデルにアクセスできます
            // 例えば、$bad->user でBadモデルに関連するUserモデルにアクセスできます

            return response()->json(['message' => 'Bad 登録が完了しました']);
        }
    }
}

