<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

//Test Start
Route::get('/test', function () {
    return view('teacher.test');
});
// Route::get('/student-details', function () {
//     return view('teacher.student-details');
// });
//Test End

Route::GET('/login', 'LoginController@index');
Route::POST('/login', 'LoginController@validation');
Route::GET('/logout', 'LogoutController@index');


Route::middleware(['sess'])->group(function(){
  //Teacher routes start here. [middlewares->(session)]
  Route::GET('/teacher1', 'TeacherController@index');
  Route::GET('/teacher/index5', 'TeacherController@index');
  Route::GET('/teacher/teacher-profile', 'TeacherController@teacherProfile');
  Route::GET('/teacher/teacher-profilePDF', 'TeacherController@teacherProfilePDF');
  Route::GET('/teacher/class-routine', 'TeacherController@routine');
  Route::POST('/teacher/class-routine', 'TeacherController@routineSearch');
  Route::GET('/teacher/all-student', 'TeacherController@allStudent');
  Route::POST('/teacher/all-student', 'TeacherController@studentDetails');
  Route::GET('/teacher/student-attendence', 'TeacherController@studentAttendence');
  Route::GET('/teacher/exam-grade', 'TeacherController@examGrade');
  Route::POST('/teacher/exam-grade', 'TeacherController@examGradeAdd');
  Route::POST('/teacher/exam-gradeSearch', 'TeacherController@examGradeSearch');
  Route::GET('/teacher/exam-grade/edit/{result_id}', 'TeacherController@examGradeEdit');
  Route::POST('/teacher/exam-grade/edit/{result_id}', 'TeacherController@examGradeModify');
  Route::GET('/teacher/grade-sheet', 'TeacherController@gradeSheet');
  Route::POST('/teacher/grade-sheet', 'TeacherController@gradeSheetSearch');
  Route::GET('/teacher/grade-sheetPDF', 'TeacherController@gradeSheetPDF');
  Route::GET('/teacher/notice-board', 'TeacherController@noticeBoard');
  Route::POST('/teacher/notice-board', 'TeacherController@noticeBoardAdd');
  Route::POST('/teacher/notice-boardSearch', 'TeacherController@noticeBoardSearch');
  Route::GET('/teacher/messaging', 'TeacherController@messaging');
  Route::POST('/teacher/messaging', 'TeacherController@messagingAdd');
  Route::POST('/teacher/lost-found', 'TeacherController@lostFound');
  Route::GET('/teacher/map', 'TeacherController@map');
  Route::GET('/teacher/note-upload', 'TeacherController@noteUpload');
  Route::POST('/teacher/note-upload', 'TeacherController@noteUploadedFile');
  Route::POST('/teacher/searchAssignment', 'TeacherController@searchAssignment');
  Route::POST('/teacher/searchNote', 'TeacherController@searchNote');
  //Live Chat
  Route::GET('/teacher/live-chat', 'chat@index');
  Route::POST('/teacher/live-chat', 'chat@send');

  Route::GET('/teacher/chat', 'chat@chatView');
  //Teacher routes end here
});
