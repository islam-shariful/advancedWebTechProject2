<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request){
        return view('login');
    }
    public function validation(Request $request){
      if($request->username == $request->password){
        $request->session()->put('username', $request->username);
        return redirect('teacher1');
      }else{
        return redirect('login');
      }
    }
}
