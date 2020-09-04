<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
  public function index(request $request){
      $request->session()->flush();
      return redirect('/login');
  }
}
