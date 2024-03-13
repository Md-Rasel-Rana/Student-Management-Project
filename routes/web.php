<?php

use App\Http\Controllers\BatchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;


///Student  web route info here
Route::get('/',[StudentController::class,'index']);
Route::get('/student-page',[StudentController::class,'studentpage']);
Route::post('/student-create',[StudentController::class,'studentcreate']);
Route::get('/student-list',[StudentController::class,'studentlist']);
Route::post('/student-ID',[StudentController::class,'studentByID']);
Route::post('/student-delete',[StudentController::class,'studentdelete']);
Route::post('/student-update',[StudentController::class,'studentUpdate']);


  ///Teacher  web route info here
Route::get('/teacher-page',[TeacherController::class,'teacherpage']);
Route::post('/teacher-create',[TeacherController::class,'teachercreate']);
Route::post('/teacher-delete',[TeacherController::class,'teacherdelete']);
Route::get('/teacher-list',[TeacherController::class,'teacherlist']);
Route::post('/teacher-update',[TeacherController::class,'teacherUpdate']);
Route::post('/teacher-ID',[TeacherController::class,'teacherByID']);


  ///Course  web route info here
Route::get('/course-page',[CourseController::class,'coursepage']);
Route::post('/course-create',[CourseController::class,'coursecreate']);
Route::get('/course-list',[CourseController::class,'courselist']);
Route::post('/course-delete',[CourseController::class,'coursedelete']);
Route::post('/course-update',[CourseController::class,'courseupdate']);
Route::post('/course-ID',[CourseController::class,'courseByID']);


///Batch web route info here
Route::get('/batch-page',[BatchController::class,'batchpage']);
Route::post('/batch-create',[BatchController::class,'batchcreate']);
Route::get('/batch-list',[BatchController::class,'batchlist']);
Route::post('/batch-delete',[BatchController::class,'batchdelete']);
Route::post('/batch-ID',[BatchController::class,'batchById']);
Route::post('/batch-update',[BatchController::class,'batchupdate']);


///Enrollment web route info here
Route::get('/enrollment-page',[EnrollmentController::class,'enrollmentpage']);
Route::post('/enrollment-create',[EnrollmentController::class,'enrollmentcreate']);
Route::get('/enrollment-list',[EnrollmentController::class,'enrollmentlist']);
Route::post('/enrollment-delete',[EnrollmentController::class,'enrollmentdelete']);


     
 


