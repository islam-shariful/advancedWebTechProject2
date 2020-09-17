<?php

namespace App\Http\Controllers;

use App\Events\FormSubmitted;
use Illuminate\Http\Request;

class Chat extends Controller
{
  // '/teacher/live-chat' 'GET'
  public function index(Request $request){
    return view('teacher.live-chat');
  }
  // '/teacher/live-chat' POST
  public function send(Request $request){
    $messageDetails = array($request->session()->get('username'),$request->text);
    event(new FormSubmitted($messageDetails));
    //return redirect('teacher/live-chat');
  }

  // '/teacher/chat' 'GET'
  public function chatView(Request $request){
    return view('teacher.chatView');
  }
}
