<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Contact;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

        //管理者お問い合わせ一覧ページ
        // public function admin_inquiry()
        // {
        //     $contacts = Contact::all();
        //     return view('admins.inquiry', ['contacts' => $contacts]);
        // }

        // public function contacts_statsu(Request $request, $id)
        // {
        //     $contact = Contact::findOrFail($id);
        //     $status = $request->input('status');

        //     $contact->status = $status;
        //     $contact->save();

        //     return redirect()->back()->with('status', '対応状況が更新されました。');
        // }
}
