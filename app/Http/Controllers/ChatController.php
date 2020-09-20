<?php

namespace App\Http\Controllers;

use App\Events\FormSubmitted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Chat;

class ChatController extends Controller
{
  // '/teacher/live-chat' 'GET'
  public function index(Request $request){
    return view('teacher.live-chat');
  }
  // '/teacher/live-chat' POST
  public function send(Request $request){
    $messageDetails = array($request->session()->get('username'),$request->text);
    event(new FormSubmitted($messageDetails));
    // $chat = new Chat();
    // $userInfo = $chat->get();
    // event(new FormSubmitted($userInfo));

    //return redirect('teacher/live-chat');
  }

  // '/teacher/chat' 'GET'
  public function chatView(Request $request){
    return view('teacher.chatView');
  }
}
