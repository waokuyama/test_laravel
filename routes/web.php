<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\member;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminRegisterController;
use App\Http\Controllers\PasswordController;
use App\Http\Livewire\LikeButton;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//トップページ
Route::get('/', function () {
    return view('welcome');
});

Route::get('/app', function() {
    return view('/components/app');
});

Route::get('/trial', function () {
    return view('trial');
});

// dd($request);
//         return view('members.dashboard', [
//             'request' => $request,
//         ]);

// ログイン時の処理
// Route::get('/dashboard', function () {
//     return view('members.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('members.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [member::class, 'test5'])->middleware(['auth', 'verified'])->name('dashboard');


Route::resource('chirps', ChirpController::class)
    ->only(['index', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::get('/splite_blade','SpliteBlade\SpliteBladeController@index')->name('splite_blade.index');
//ajaxの練習
Route::get('index',function() {
    return view('index');
});

Route::post('/iza', 'TestController@iza')->name('iza');

Route::post('ajax-test/show', 'ProfileController@show'); 

Route::post('/posts/{id}/like', [ProfileController::class, 'like'])->name('posts.like');

Route::post('/member_top', [member::class, 'member_top'])->name('member_top');

// 会員トップページ
Route::get('/member_top1', [member::class, 'member_top1'])->name('member_top1');

//マイページ
Route::get('/member_mypage', [member::class, 'member_mypage'])->name('member_mypage');


//投稿ページ
Route::get('/member_post', [member::class, 'member_post'])->name('member_post');

//投稿内容
Route::post('/report_post', [member::class, 'report_post'])->name('report_post');


//閲覧ページ
Route::get('/member_browse', [member::class, 'member_browse'])->name('member_browse');

//フレンド一覧ページ
Route::get('/member_friend', [member::class, 'member_friend'])->name('member_friend');

//自分の投稿一覧
Route::get('/member_mypost', [member::class, 'member_mypost'])->name('member_mypost');

//お問い合わせページ
Route::get('/member_form', [member::class, 'member_form'])->name('member_form');

//お問い合わせ送信ページ
Route::post('/member_contacts',[ContactController::class, 'member_contacts'])->name('member_contacts');

//問題テスト
Route::get('/test_test', [ContactController::class, 'test_test'])->name('test_test');

//いいね機能練習
Route::post('/like/{postId}',[LikeController::class,'store']);
Route::post('/unlike/{postId}',[LikeController::class,'destroy']);





//管理者用トップページ
Route::get('/admin_top', [member::class, 'admin_top'])->name('admin_top');

//管理者用お問い合わせ一覧ページ
Route::get('/admin_inquiry', [member::class, 'admin_inquiry'])->name('admin_inquiry');

//管理者用申告一覧ページ
Route::get('/admin_report', [member::class, 'admin_report'])->name('admin_report');

//bad一覧
Route::get('/admin_bad', [member::class, 'admin_bad'])->name('admin_bad');





//テストページ（機能テスト）
Route::get('/test', [member::class, 'test'])->name('test');
Route::post('/posts/{id}/like', [member::class, 'toggleLike']);

//リレーショナル値の取得
Route::get('/member_gets', [member::class, 'member_gets'])->name('member_gets');

/*
|--------------------------------------------------------------------------
| 管理者用ルーティング
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'admin'], function () {
    // 登録
    Route::get('register', [AdminRegisterController::class, 'create'])
        ->name('admin.register');

    Route::get('test', [AdminRegisterController::class, 'test2'])->name('admin.test');

    Route::post('register', [AdminRegisterController::class, 'store']);

    // ログイン
    Route::get('login', [AdminLoginController::class, 'showLoginPage'])
        ->name('admin.login');

    Route::post('login', [AdminLoginController::class, 'login']);

    // 以下の中は認証必須のエンドポイントとなる
    Route::middleware(['auth:admin'])->group(function () {
        // ダッシュボード
        Route::get('dashboard', fn() => view('admin.dashboard'))
            ->name('admin.dashboard');
    });
});

//ログインしてから出ないと見せたくないページの記述
Route::middleware(['auth:admin'])->group(function () {
    // ここに記述
});

// パスワードリセット機能関係
// パスワードリセット関連
Route::prefix('password_reset')->name('password_reset.')->group(function () {
    Route::prefix('email')->name('email.')->group(function () {
        // パスワードリセットメール送信フォームページ
        Route::get('/', [PasswordController::class, 'emailFormResetPassword'])->name('form');
        // メール送信処理
        Route::post('/', [PasswordController::class, 'sendEmailResetPassword'])->name('send');
        // メール送信完了ページ
        Route::get('/send_complete', [PasswordController::class, 'sendComplete'])->name('send_complete');
    });
    // パスワード再設定ページ
    Route::get('/edit', [PasswordController::class, 'edit'])->name('edit');
    // パスワード更新処理
    Route::post('/update', [PasswordController::class, 'update'])->name('update');
    // パスワード更新終了ページ
    Route::get('/edited', [PasswordController::class, 'edited'])->name('edited');
});
// ここまで

require __DIR__.'/auth.php';
