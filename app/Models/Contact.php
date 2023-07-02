<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Support\Facades\DB; 

class Contact extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //コントローラとモデルのやってみる　今日のお問い合わせ合計件数
    public function month_totle()
    {
        $currentMonth = date('Y-m');
        $totalCount = DB::table('contacts')
        ->where(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"), $currentMonth)
        ->count();
    
        return $totalCount;
    }

    //今月のお問い合わせの中で一番多かった日と件数の取得
    public function month_max()
    {
        $currentMonth = date('Y-m');
        $result = DB::table('contacts')
        ->select(DB::raw('DATE(created_at) as date'), DB::raw('COUNT(*) as count'))
        ->whereRaw('DATE_FORMAT(created_at, "%Y-%m") = ?', [$currentMonth])
        ->groupBy('date')
        ->orderBy('count', 'desc')
        ->first();
        return $result;
    }

    //1週間ごとのお問い合わせ数と日付の取得
    public function week_date()
    {
        $startOfWeek = date('Y-m-d', strtotime('last monday'));
        $endOfWeek = date('Y-m-d', strtotime('next sunday'));

        $weekCounts = DB::table('contacts')
        ->select(DB::raw('DAY(created_at) as day'), DB::raw('COUNT(*) as total'))
        ->whereBetween(DB::raw('DATE(created_at)'), [$startOfWeek, $endOfWeek])
        ->groupBy('day')
        ->get();

        // dd($weekCounts);

        return $weekCounts;
    }
}
