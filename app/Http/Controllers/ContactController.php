<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function member_contacts(Request $request)
    {
        $validatedData = $request->validate([
            'message' => 'required',
        ]);

        $post = new Contact;
        $post->message = $validatedData['message'];
        $post->user_id = Auth()->id();
        $post->save(); 


        //ルートのmember_mypostを実行させる
        return view('members.dashboard',['user' => Auth::user()]);
    }

    public function test_test()
    {
        return view('members.test_test');
    }
}
