<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Bad;
use Auth;

class badController extends Controller
{
    public function store($postId)
    {
        Auth::user()->bad($postId);
    }

    public function favorite(Favorite $F,$id) {
        $user = Auth::user();
        $posts = Post::find($id);

        $record_id = Favorite::where('user_id', $user['id'])
                                ->where('chapter_id',$posts['id'])
                                ->first();
        
        if(is_null($record_id)){
            $inputs =[
                'user_id' =>$user['id'],
                'post_id' =>$posts['id'],
            ];
            $F->fill($inputs)->save();
            return json_encode('登録');
        }else{
            Favorite::destroy($record_id['id']);
            return json_encode('削除');
        }
    }
    
}
