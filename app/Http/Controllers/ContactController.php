<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; 

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

    //お問い合わせ受信全ての受信
    public function admin_inquiry()
    {
        // $contacts = Contact::paginate(10);
        $contacts = Contact::orderBy('created_at', 'desc')->paginate(10);
        return view('admins.inquiry', ['contacts' => $contacts]);
    }

    public function contacts_statsu(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);
        $status = $request->input('status');

        $contact->status = $status;
        $contact->save();

        return redirect()->back()->with('status', '対応状況が更新されました。');
    }

    //お問い合わせ受信ステータス別データの取得
    public function admin_genre($id)
    {
        $contacts = Contact::where('status', $id)
        ->orderBy('created_at', 'desc')
        ->paginate(10);
        return view('admins.inquiry', ['contacts' => $contacts]);
    }


}
