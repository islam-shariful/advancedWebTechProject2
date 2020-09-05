<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Student;
use App\Notice;
use App\Routine;
use App\Grade;
use App\Result;
use App\Message;

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
  // '/teacher/all-student' 'GET'
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
  // '/teacher/all-student' 'POST'
  public function studentDetails(Request $request){
    if($request->session()->has('username')){
      $student = new Student();
      $studentInfo = $student->where('student_id', $request->roll)
                        ->get();
      return view('teacher.student-details')->with('studentInfo', $studentInfo[0]);
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
  // '/teacher/exam-grade' 'GET'
  public function examGrade(Request $request){
    if($request->session()->has('username')){
      $result = new Result();
      $resultList = $result->get();
      return view('teacher.exam-grade')->with('resultList', $resultList);
    }else{
      return redirect('/login');
    }
  }
  // '/teacher/exam-grade' 'POST'
  public function examGradeAdd(Request $request){
    if($request->session()->has('username')){
      $result = new Result();
      $result->result_id = $request->result_id;
      $result->class_id = $request->class_id;
      $result->section_id = $request->section_id;
      $result->attendance = $request->attendance;
      $result->midmarks = $request->midmarks;
      $result->finalmarks = $request->finalmarks;
      $result->total = $request->total;
      $result->subject_id = $request->subject_id;
      $result->student_id = $request->student_id;
      $result->save();

      return redirect('teacher/exam-grade');
    }else{
      return redirect('/login');
    }
  }
  // '/teacher/exam-gradeSearch' 'POST'
  public function examGradeSearch(Request $request){
    if($request->session()->has('username')){
      $result = new Result();
      $resultList = $result->where('student_id', $request->student_id)
                            ->get();
      return view('teacher.exam-grade')->with('resultList', $resultList);
    }else{
      return redirect('/login');
    }
  }
  // '/teacher/exam-grade/edit' 'GET'
  public function examGradeEdit($result_id, Request $request){
    if($request->session()->has('username')){
      $result = new Result();
      $student = new Student();
      $resultList = $result->where('result_id', $result_id)
                        ->get();
      $studentInfo = $student->where('student_id', $resultList[0]->student_id)
                        ->get();
      return view('teacher.exam-grade-modify')->with('resultList', $resultList[0])
                                              ->with('studentInfo', $studentInfo[0]);
    }else{
      return redirect('/login');
    }
  }
  // '/teacher/exam-grade/edit' 'POST'
  public function examGradeModify($result_id, Request $request){
    if($request->session()->has('username')){
      $result = new Result();
      //$grade = new Grade();

      $result = Result::find($result_id);
      $result->result_id = $request->result_id;
      $result->class_id = $request->class_id;
      $result->section_id = $request->section_id;
      $result->attendance = $request->attendance;
      $result->midmarks = $request->midmarks;
      $result->finalmarks = $request->finalmarks;
      $result->total = $request->total;
      $result->subject_id = $request->subject_id;
      $result->student_id = $request->student_id;
      $result->save();

      return redirect('teacher/exam-grade');
    }else{
      return redirect('/login');
    }
  }
  // '/teacher/grade-sheet' 'GET'
  public function gradeSheet(Request $request){
    if($request->session()->has('username')){
      $grade = new Grade();
      $gradeList = $grade->get();
      return view('teacher.grade-sheet')->with('gradeList', $gradeList);
    }else{
      return redirect('/login');
    }
  }
  // '/teacher/grade-sheet' 'POST'
  public function gradeSheetSearch(Request $request){
    if($request->session()->has('username')){
      $grade = new Grade();
      $gradeList = $grade->where('student_id', $request->student_id)
                          ->get();
      return view('teacher.grade-sheet')->with('gradeList', $gradeList);
    }else{
      return redirect('/login');
    }
  }
  // '/teacher/notice-board' 'GET'
  public function noticeBoard(Request $request){
    if($request->session()->has('username')){
      $notice = new Notice();
      $noticeList = $notice->get();
      return view('teacher.notice-board')->with('noticeList', $noticeList);
    }else{
      return redirect('/login');
    }
  }
  // '/teacher/notice-board' 'POST'
  public function noticeBoardAdd(Request $request){
    if($request->session()->has('username')){
      $notice = new Notice();
      $notice->noticedate = date("Y-m-d");
      $notice->notice_id = $request->notice_id;
      $notice->description = $request->description;
      $notice->subject_id = $request->subject_id;
      $notice->class_id = $request->class_id;
      $notice->section_id = $request->section_id;
      $notice->save();
      return redirect('teacher/notice-board');
    }else{
      return redirect('/login');
    }
  }
  // '/teacher/notice-boardSearch' 'POST'
  public function noticeBoardSearch(Request $request){
    if($request->session()->has('username')){
      $notice = new Notice();
      $noticeList = $notice->where('class_id', $request->class_id)
                            ->get();
      return view('teacher/notice-board')->with('noticeList', $noticeList);
    }else{
      return redirect('/login');
    }
  }
  // '/teacher/messaging' 'GET'
  public function messaging(Request $request){
    if($request->session()->has('username')){
      return view('teacher.messaging');
    }else{
      return redirect('/login');
    }
  }
  // '/teacher/messaging' 'POST'
  public function messagingAdd(Request $request){
    if($request->session()->has('username')){
      $message = new Message();
      $message->title = $request->title;
      $message->recipient = $request->recipient;
      $message->message = $request->message;
      $message->date = date("Y-m-d");
      $message->save();
      return redirect('teacher/messaging');
      //echo $request->message;
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
