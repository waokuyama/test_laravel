<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Post;
use App\Models\Like;
use App\Models\Bad;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Auth\Passwords\CanResetPassword;

class User extends Authenticatable
{
    // メールリセット機能追加分
    public function sendPasswordResetNotification($token)
    {
        $url = url("reset-password/${token}");
        $this->notify(new ResetPasswordNotification($url));
    }
    // ここまで


    public function chirps(): HasMany
    {
        return $this->hasMany(Chirp::class);
    }


    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    //リレーショナル練習
    protected $table = 'users';

    // Userモデル
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    //外部キーも一緒に削除するメソッド　削除できた
    protected static function boot(){
        parent::boot();
        static::deleting(function ($user) {
            $user->posts()->delete();
        });
    }


    //いいね機能練習
       //多対多のリレーションを書く
       public function likes()
       {
        // dd('テスト1');
           return $this->belongsToMany('App\Models\Post','likes','user_id','post_id')->withTimestamps();
       }
       //belongsToManyメソッドの引数
       //第一引数('App\Models\Post'：中間テーブルの先のテーブル)
       //第二引数('likes'：中間テーブルの名前)
       //第三、四引数(それぞれのテーブルとつなげる外部キーの絡む名)
   
       //この投稿に対して既にlikeしたかどうかを判別する
       public function isLike($postId)
       {
         return $this->likes()->where('post_id',$postId)->exists();
       }
   
       //isLikeを使って、既にlikeしたか確認したあと、いいねする（重複させない）
       public function like($postId)
       {
         if($this->isLike($postId)){
          // dd($postId);
          
          $this->likes()->detach($postId);
         } else {
          // dd($postId);
           $this->likes()->attach($postId);
         }
       }

    // bad機能追加
    public function bads()
    {
        return $this-> belongsToMany('App\Models\Post', 'bads','user_id','post_id')->withTimestamps();
    }

    public function isbad($postId)
    {
        return $this->bads()->where('post_id',$postId)->exists();
    }

    public function bad($postId)
    {
        if($this->isBad($postId)){
            $this->bads()->detach($postId);
        }else {
            $this->bads()->attach($postId);
        }
    }
}
