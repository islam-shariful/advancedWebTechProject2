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

//test starts
Route::get('/assets/teacher/', function () {
    return redirect('public');
});
Route::get('/test', function () {
    return view('teacher.test');
});
Route::get('/header', function () {
    return view('teacher.header');
});
//test end

Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@validation');
Route::get('/logout', 'LogoutController@index');

//Teacher routes start here
Route::get('/teacher1', 'TeacherController@index');
Route::get('/teacher/index5', 'TeacherController@index');
Route::get('/teacher/teacher-profile', 'TeacherController@teacherProfile');
Route::get('/teacher/class-routine', 'TeacherController@routine');
Route::get('/teacher/all-student', 'TeacherController@allStudent');
Route::get('/teacher/student-attendence', 'TeacherController@studentAttendence');
Route::get('/teacher/exam-grade', 'TeacherController@examGrade');
Route::get('/teacher/grade-sheet', 'TeacherController@gradeSheet');
Route::get('/teacher/notice-board', 'TeacherController@noticeBoard');
Route::get('/teacher/messaging', 'TeacherController@messaging');
Route::get('/teacher/map', 'TeacherController@map');
Route::get('/teacher/note-upload', 'TeacherController@noteUpload');
//Teacher routes end here
