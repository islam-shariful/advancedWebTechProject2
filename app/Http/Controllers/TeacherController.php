<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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
    // $notice = new Notice();
    // $noticeList = $notice->get();
    $noticeList = DB::table('notice')->get();
    return view('teacher.index5')->with('noticeList', $noticeList);
  }
  // '/teacher/teacher-profile'
  public function teacherProfile(Request $request){
    $teacher = new Teacher();
    $teacherInfo = $teacher->where('teacher_id', $request->session()->get('username'))
                      ->get();
    return view('teacher.teacher-profile')->with('teacherInfo', $teacherInfo[0]);
  }
  // 'teacher/class-routine' 'GET'
  public function routine(Request $request){
    $routine = new Routine();
    $routineList = $routine->get();
    return view('teacher.class-routine')->with('routineList', $routineList);
  }
  // 'teacher/class-routine' 'POST'
  public function routineSearch(Request $request){
    $routine = new Routine();
    $routineList = $routine->where('teacher_id', $request->teacher_id)
                            ->get();
    return view('teacher.class-routine')->with('routineList', $routineList);
  }
  // '/teacher/all-student' 'GET'
  public function allStudent(Request $request){
    $student = new Student();
    $studentList = $student->get();
    return view('teacher.all-student')->with('studentList', $studentList);
    //return view('teacher.test')->with('studentList', $studentList);
  }
  // '/teacher/all-student' 'POST'
  public function studentDetails(Request $request){
    $student = new Student();
    $studentInfo = $student->where('student_id', $request->roll)
                      ->get();
    return view('teacher.student-details')->with('studentInfo', $studentInfo[0]);
    //return view('teacher.test')->with('studentList', $studentList);
  }
  // '/teacher/student-attendence'
  public function studentAttendence(Request $request){
    return view('teacher.student-attendence');
  }
  // '/teacher/exam-grade' 'GET'
  public function examGrade(Request $request){
    $result = new Result();
    $resultList = $result->get();
    return view('teacher.exam-grade')->with('resultList', $resultList);
  }
  // '/teacher/exam-grade' 'POST'
  public function examGradeAdd(Request $request){
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
  }
  // '/teacher/exam-gradeSearch' 'POST'
  public function examGradeSearch(Request $request){
    $result = new Result();
    $resultList = $result->where('student_id', $request->student_id)
                          ->get();
    return view('teacher.exam-grade')->with('resultList', $resultList);
  }
  // '/teacher/exam-grade/edit' 'GET'
  public function examGradeEdit($result_id, Request $request){
    $result = new Result();
    $student = new Student();
    $resultList = $result->where('result_id', $result_id)
                      ->get();
    $studentInfo = $student->where('student_id', $resultList[0]->student_id)
                      ->get();
    return view('teacher.exam-grade-modify')->with('resultList', $resultList[0])
                                            ->with('studentInfo', $studentInfo[0]);
  }
  // '/teacher/exam-grade/edit' 'POST'
  public function examGradeModify($result_id, Request $request){
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
  }
  // '/teacher/grade-sheet' 'GET'
  public function gradeSheet(Request $request){
    $grade = new Grade();
    $gradeList = $grade->get();
    return view('teacher.grade-sheet')->with('gradeList', $gradeList);
  }
  // '/teacher/grade-sheet' 'POST'
  public function gradeSheetSearch(Request $request){
    $grade = new Grade();
    $gradeList = $grade->where('student_id', $request->student_id)
                        ->get();
    return view('teacher.grade-sheet')->with('gradeList', $gradeList);
  }
  // '/teacher/notice-board' 'GET'
  public function noticeBoard(Request $request){
    $notice = new Notice();
    $noticeList = $notice->get();
    return view('teacher.notice-board')->with('noticeList', $noticeList);
  }
  // '/teacher/notice-board' 'POST'
  public function noticeBoardAdd(Request $request){
    $notice = new Notice();
    $notice->noticedate = date("Y-m-d");
    $notice->notice_id = $request->notice_id;
    $notice->description = $request->description;
    $notice->subject_id = $request->subject_id;
    $notice->class_id = $request->class_id;
    $notice->section_id = $request->section_id;
    $notice->save();
    return redirect('teacher/notice-board');
  }
  // '/teacher/notice-boardSearch' 'POST'
  public function noticeBoardSearch(Request $request){
    $notice = new Notice();
    $noticeList = $notice->where('class_id', $request->class_id)
                          ->get();
    return view('teacher/notice-board')->with('noticeList', $noticeList);
  }
  // '/teacher/messaging' 'GET'
  public function messaging(Request $request){
    return view('teacher.messaging');
  }
  // '/teacher/messaging' 'POST'
  public function messagingAdd(Request $request){
    $message = new Message();
    $message->title = $request->title;
    $message->recipient = $request->recipient;
    $message->message = $request->message;
    $message->date = date("Y-m-d");
    $message->save();
    return redirect('teacher/messaging');
    //echo $request->message;
  }
  // '/teacher/map'
  public function map(Request $request){
    return view('teacher.map');
  }
  // '/teacher/note-upload' 'GET'
  public function noteUpload(Request $request){
    return view('teacher.note-upload');
  }
  // '/teacher/note-upload' 'POST'
  public function noteUploadedFile(Request $request){
    if($request->hasfile('uploadFile')){
      $file = $request->file('uploadFile');
      if($file->move('upload', $file->getClientOriginalName() )){
          $request->session()->flash('uploadStatus','File Upload Successfully');
          return redirect('teacher/note-upload');
      }else{
        return redirect('teacher/note-upload');
      }
    }
    else{
      $request->session()->flash('uploadStatus','File Upload Successfully Failed');
      return redirect('teacher/note-upload');
    }
  }






}
