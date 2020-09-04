<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Student;
use App\Notice;
use App\Routine;
use App\Grade;
use App\Result;

class TeacherController extends Controller
{
  // '/teacher1'  ||  '/teacher/index5'
  public function index(Request $request){
    if($request->session()->has('username')){
      $notice = new Notice();
      $noticeList = $notice->get();
      return view('teacher.index5')->with('noticeList', $noticeList);
    }else{
      return redirect('/login');
    }
  }
  // '/teacher/teacher-profile'
  public function teacherProfile(Request $request){
    if($request->session()->has('username')){
      $teacher = new Teacher();
      $teacherInfo = $teacher->where('teacher_id', $request->session()->get('username'))
                        ->get();
      return view('teacher.teacher-profile')->with('teacherInfo', $teacherInfo[0]);
    }else{
      return redirect('/login');
    }
  }
  // 'teacher/class-routine'
  public function routine(Request $request){
    if($request->session()->has('username')){
      $routine = new Routine();
      $routineList = $routine->get();
      return view('teacher.class-routine')->with('routineList', $routineList);
      //return view('teacher.test')->with('routineList', $routineList);
      //echo $routineList[0]['routine_id'];
    }else{
      return redirect('/login');
    }
  }
  // '/teacher/all-student'
  public function allStudent(Request $request){
    if($request->session()->has('username')){
      $student = new Student();
      $studentList = $student->get();
      return view('teacher.all-student')->with('studentList', $studentList);
      //return view('teacher.test')->with('studentList', $studentList);
    }else{
      return redirect('/login');
    }
  }
  // '/teacher/student-attendence'
  public function studentAttendence(Request $request){
    if($request->session()->has('username')){
      return view('teacher.student-attendence');
    }else{
      return redirect('/login');
    }
  }
  // '/teacher/exam-grade'
  public function examGrade(Request $request){
    if($request->session()->has('username')){
      $result = new Result();
      $resultList = $result->get();
      return view('teacher.exam-grade')->with('resultList', $resultList);
    }else{
      return redirect('/login');
    }
  }
  // '/teacher/grade-sheet'
  public function gradeSheet(Request $request){
    if($request->session()->has('username')){
      $grade = new Grade();
      $gradeList = $grade->get();
      return view('teacher.grade-sheet')->with('gradeList', $gradeList);
    }else{
      return redirect('/login');
    }
  }
  // '/teacher/notice-board'
  public function noticeBoard(Request $request){
    if($request->session()->has('username')){
      $notice = new Notice();
      $noticeList = $notice->get();
      return view('teacher.notice-board')->with('noticeList', $noticeList);
    }else{
      return redirect('/login');
    }
  }
  // '/teacher/messaging'
  public function messaging(Request $request){
    if($request->session()->has('username')){
      return view('teacher.messaging');
    }else{
      return redirect('/login');
    }
  }
  // '/teacher/map'
  public function map(Request $request){
    if($request->session()->has('username')){
      return view('teacher.map');
    }else{
      return redirect('/login');
    }
  }
  // '/teacher/note-upload'
  public function noteUpload(Request $request){
    if($request->session()->has('username')){
      return view('teacher.note-upload');
    }else{
      return redirect('/login');
    }
  }






}
