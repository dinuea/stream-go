<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function index(){
        $messages=Message::get();
        return view('messages', compact('messages'));
    }

    public function store(Request $request){
        $validator = $this->validation($request);
        if ($validator->fails()) {
            $status = 'Request Failed';
            return ['error' => true, 'errors' => $validator->errors(), 'message' => $status];
        }
        $message = New Message();
        $message->author_id = $request->author_id;
        $message->message = $request->message;
        $message->save();

        $status = 'Message stored succefully.';
        return ['error' => false, 'message' => $status];
    }

    public function validation($request)
    {
        $param = $request->all();
        $validate_rules = [
            'message' => 'required|max:255',
            'author_id' => 'required',
        ];
        $validate_note = [
            'message.required' => 'Please enter Message',
            'message.max:255' => 'Messages should be limited to 255 characters',
            'author_id.required' => 'Please enter author ID',
        ];
        return Validator::make($param, $validate_rules, $validate_note);
    }


}
