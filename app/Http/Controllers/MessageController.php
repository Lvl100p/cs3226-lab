<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Message;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use \Illuminate\Support\Facades\Auth;


class MessageController extends Controller {

    public function __construct()
    {
        $this->middleware('auth', []);
        $this->middleware('admin', ['except'=>['show', 'update']]);
    }

    public function index() {
         // only admin (defined in construct)
        $messages = Message::all();
        foreach($messages as $message) {
            $message->student;
        }        
        return view('messages', [
            'messages' => $messages
        ]);
    }

    public function show($id) {
        if(Auth::user()->access != "admin" && Auth::user()->id != $id) abort(403, 'Unauthorized action.');

        $message = Student::find($id)->message;

        if(!isset($message)) {
        	$message = new Message();
        	$message->student_id = $id;
        	$message->student;
        }

        return view('message', [
            'message' => $message
        ]);
    }

    public function update($id, Request $request) {
        if(Auth::user()->access != "admin" && Auth::user()->id != $id) abort(403, 'Unauthorized action.');

    	$message = Student::find($id)->message;
        if(!isset($message)) {
        	$message = new Message();
        	$message->student_id = $id;
        	$message->student;
        }
        $message->message = $request->message;
        $message->save();

        Session::flash('msg', "Message is updated.");

        return view('message', [
            'message' => $message
        ]);

    }

    public function destroy($id, Request $request) {
        // only admin (defined in construct)
        $message = Student::find($id)->message;

        Session::flash('msg', $message->student->name . "'s message is deleted.");

        Message::destroy($message->id);
        return Redirect::to('messages/');
    }
}
