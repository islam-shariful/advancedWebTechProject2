<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Teacher;

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
    //Socialite Start
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();

        $id = '20-'.mt_rand(8000, 8999).'-03';

        $teacher = new Teacher();
        $teacher->teacher_id = $id;
        $teacher->teachername = $user->name;
        $teacher->teacheremail = $user->email;
        $teacher->teacherdesignation = 'teacher';
        $teacher->teacherdepartment = 'nil';
        $teacher->teacheraddress = 'nil';
        $teacher->teacherdob = 'nil';
        $teacher->teachergender = 'nil';
        $teacher->teacherreligion = 'nil';
        $teacher->teacherjoiningdate = date("Y-m-d");
        $teacher->teacherfathername = 'nil';
        $teacher->teachermothername = 'nil';
        $teacher->subject_id = 00;
        $teacher->save();

        return '<h3>Your User_ID: '.$id.' and Password: '.$id. ' <a href="http://localhost:8000/login">Login</a></h3>';
    }
    //Socialite End
}
