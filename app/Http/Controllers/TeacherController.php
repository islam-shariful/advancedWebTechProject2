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
use App\Assignment;
use App\Note;
use App\LostFound;

use PDF;

class TeacherController extends Controller
{
  // '/teacher1'  ||  '/teacher/index5'
  public function index(Request $request){
    // $notice = new Notice();
    // $noticeList = $notice->get();
    $noticeList = DB::table('notice')->orderBy('notice_id', 'DESC')->get();
    return view('teacher.index5')->with('noticeList', $noticeList);
  }
  // '/teacher/teacher-profile' 'GET'
  public function teacherProfile(Request $request){
    $teacher = new Teacher();
    $teacherInfo = $teacher->where('teacher_id', $request->session()->get('username'))
                      ->get();
    return view('teacher.teacher-profile')->with('teacherInfo', $teacherInfo[0]);
  }
  // '/teacher/teacher-profilePDF' 'GET'
  public function teacherProfilePDF(Request $request){
    $teacher = new Teacher();
    $teacherInfo = $teacher->where('teacher_id', $request->session()->get('username'))
                      ->get();
    // share data to view
    view()->share('teacherInfo',$teacherInfo[0]);
    $pdf = PDF::loadView('teacher.teacher-profilePDF', $teacherInfo[0]);

    // download PDF file with download method
    return $pdf->download($teacherInfo[0]['teacher_id'].'.pdf');
  }
  // 'teacher/class-routine' 'GET'
  public function routine(Request $request){
    $routine = new Routine();
    $routineList = $routine->get();
    return view('teacher.class-routine')->with('routineList', $routineList);
  }
  // 'teacher/class-routine' 'POST'=>'AJAX Search'
  public function routineSearch(Request $request){
    //$teacher_id = $_POST['teacher_id'];
    $teacher_id = $request->teacher_id;

    $routine = new Routine();
    $routineList = $routine->where('teacher_id', 'like', '%'.$teacher_id.'%')
                            ->get();
    $output = '';
    if(count($routineList)>0){
      foreach($routineList as $row)
      {
        $output .= '
                    <tr>
                      <th>'.$row->day.'</th>
                      <th>'.$row->class_id.'</th>
                      <th>'.$row->subjectname.'</th>
                      <th>'.$row->subject_id.'</th>
                      <th>'.$row->sectionname.'</th>
                      <th>'.$row->section_id.'</th>
                      <th>'.$row->teacher_id.'</th>
                      <th>'.$row->teachername.'</th>
                      <th>'.$row->startingtime.'</th>
                      <th>'.$row->endingtime.'</th>
                      <th>'.$row->routine_id.'</th>
                    </tr>
                    ';
      }
      echo $output;
    }
    else{
      $output = '
       <tr>
        <td>No Data Found</td>
       </tr>
       ';
      echo $output;
    }

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
  // '/teacher/grade-sheetPDF' 'GET' 'Generate PDF'
  public function gradeSheetPDF(Request $request){
    $grade = new Grade();
    // retreive all records from db
    $gradeList = $grade->get();

    // share data to view
    view()->share('gradeList',$gradeList);
    $pdf = PDF::loadView('teacher.grade-sheetPDF', $gradeList);

    // download PDF file with download method
    return $pdf->download('pdf_file.pdf');
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
    $class_id = $_POST['class_id'];
    //$class_id = $request->class_id;

    $notice = new Notice();
    $noticeList = $notice->where('class_id', 'like', '%'.$class_id.'%')
                          ->orderBy('notice_id', 'DESC')
                          ->get();
    $output = '';
    if(count($noticeList)>0){
      foreach($noticeList as $row)
      {
        $output .= '
                    <div class="notice-list">
                      <div class="post-date bg-skyblue">
                         '.$row->noticedate.'
                      </div>
                      <h6 class="notice-title">
                        <a href="#">'.$row->description.'</a>
                      </h6>
                      <div class="entry-meta">
                        Class :'.$row->class_id.'/ Section :
                        <span>'.$row->section_id.'</span>/ Subject :
                        <span>'.$row->subject_id.'</span>/
                        <i>Notice ID : </i>
                        <span><i>'.$row->notice_id.'</i></span>
                      </div>
                    </div>
                    ';
      }
      echo $output;
    }
    else{
      $output = '
       <tr>
        <td>No Data Found</td>
       </tr>
       ';
      echo $output;
    }

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
  }
  // '/teacher/lost-found' 'POST'
  public function lostFound(Request $request){
    $lostFound = new LostFound();
    $lostFound->lostfound_id = $request->lostfound_id;
    $lostFound->lostname = $request->lostname;
    $lostFound->lostdescription = $request->lostdescription;
    $lostFound->lostday = $request->lostday;
    $lostFound->found = $request->found;
    $lostFound->received = $request->received;
    $lostFound->save();

    return redirect('teacher/messaging');
  }
  // '/teacher/map'
  public function map(Request $request){
    return view('teacher.map');
  }
  // '/teacher/note-upload' 'GET'
  public function noteUpload(Request $request){
    $assignment = new Assignment();
    $note = new Note();

    $assignmentList = $assignment->orderBy('date', 'DESC')->get();
    $noteList = $note->orderBy('date', 'DESC')->get();
    return view('teacher.note-upload')->with('assignmentList', $assignmentList)
                                        ->with('noteList', $noteList);
  }
  // '/teacher/note-upload' 'POST'
  public function noteUploadedFile(Request $request){
    // For Assignment & Note
    if($request->hasfile('uploadAssignment') && $request->hasfile('uploadNote') ){
      $AssignmentFile =  $request->file('uploadAssignment');
      $noteFile       =  $request->file('uploadNote');

      $assignment = new Assignment();
      $assignment->assignment_id = $request->assignment_id;
      $assignment->filename = $AssignmentFile->getClientOriginalName();
      $assignment->directory = 'upload/assignment';
      $assignment->date = date("Y-m-d");
      $assignment->duedate = $request->duedate;
      $assignment->class_id = $request->class_id;
      $assignment->section_id = $request->section_id;
      $assignment->subject_id = $request->subject_id;
      $assignment->save();

      $note = new Note();
      $note->note_id = $request->note_id;
      $note->filename = $noteFile->getClientOriginalName();
      $note->directory = 'upload/note';
      $note->date = date("Y-m-d");
      $note->class_id = $request->class_id;
      $note->section_id = $request->section_id;
      $note->subject_id = $request->subject_id;
      $note->save();


      if($AssignmentFile->move('upload/assignment', $AssignmentFile->getClientOriginalName()) && $noteFile->move('upload/note', $noteFile->getClientOriginalName()) ){
          $request->session()->flash('bothUploadStatus','Assignment & Note Uploaded Successfully');
          return redirect('teacher/note-upload');
      }else{
        return redirect('teacher/note-upload');
      }
    }
    // For Assignment
    else if($request->hasfile('uploadAssignment') ){
      $AssignmentFile =  $request->file('uploadAssignment');

      $assignment = new Assignment();
      $assignment->assignment_id = $request->assignment_id;
      $assignment->filename = $AssignmentFile->getClientOriginalName();
      $assignment->directory = 'upload/assignment';
      $assignment->date = date("Y-m-d");
      $assignment->duedate = $request->duedate;
      $assignment->class_id = $request->class_id;
      $assignment->section_id = $request->section_id;
      $assignment->subject_id = $request->subject_id;
      $assignment->save();

      if($AssignmentFile->move('upload/assignment', $AssignmentFile->getClientOriginalName()) ){
          $request->session()->flash('assignmentUploadStatus','Assignment Uploaded Successfully');
          return redirect('teacher/note-upload');
      }else{
        return redirect('teacher/note-upload');
      }
    }
    // For Note
    else if($request->hasfile('uploadNote') ){
      $noteFile =  $request->file('uploadNote');

      $note = new Note();
      $note->note_id = $request->note_id;
      $note->filename = $noteFile->getClientOriginalName();
      $note->directory = 'upload/note';
      $note->date = date("Y-m-d");
      $note->class_id = $request->class_id;
      $note->section_id = $request->section_id;
      $note->subject_id = $request->subject_id;
      $note->save();

      if( $noteFile->move('upload/note', $noteFile->getClientOriginalName()) ){
          $request->session()->flash('noteUploadStatus','Note Uploaded Successfully');
          return redirect('teacher/note-upload');
      }else{
        return redirect('teacher/note-upload');
      }
    }
    // For Nothing
    else{
      $request->session()->flash('failedUploadStatus','File Upload Successfully Failed');
      return redirect('teacher/note-upload');
    }
  }
  // '/teacher/searchAssignment' 'POST'
  public function searchAssignment(Request $request){
    $assignment = new Assignment();
    $note = new Note();
    $assignmentList= $assignment->where('class_id', $request->class_id)
                ->get();
    $noteList = $note->get();
    return view('teacher.note-upload')->with('assignmentList', $assignmentList)
                                        ->with('noteList', $noteList);
  }
  // '/teacher/searchNote' 'POST'
  public function searchNote(Request $request){
    $note = new Note();
    $assignment = new Assignment();
    $noteList = $note->where('class_id', $request->class_id)
                      ->get();
    $assignmentList = $assignment->get();
    return view('teacher.note-upload')->with('noteList', $noteList)
                                        ->with('assignmentList', $assignmentList);
  }





}
