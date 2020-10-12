<?php

use App\Http\Controllers\CtrlController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\SaveController;
use App\Http\Middleware\LogMiddleware;
//use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Annotation\Route as AnnotationRoute;

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
    return view('welcome');
});
Route::get('/hello', [HelloController::class, 'index']);
Route::get('hello/view', [HelloController::class, 'view']);
Route::get('hello/list', [HelloController::class, 'list']);
Route::get('/view', [ViewController::class, 'if']);
Route::get('/view/foreach_loop', [ViewController::class, 'foreach_loop']);
Route::get('/view/master', [ViewController::class, 'master']);
Route::get('/view/comp', [ViewController::class, 'comp']);
Route::get('/view/header', [CtrlController::class, 'header']);
Route::get('/ctrl/result', [ViewController::class, 'form']);
Route::post('/ctrl/result', [CtrlController::class, 'result']);
Route::get('/ctrl/upload', [CtrlController::class, 'upload']);
Route::post('/ctrl/uploadfile', [CtrlController::class, 'uploadfile']);
Route::get('/ctrl/middle', [CtrlController::class, 'middle'])
    ->middleware(LogMiddleware::class);
Route::get('/state/recCookie', [StateController::class, 'recCookie']);
Route::get('/state/readcookie', [StateController::class, 'readcookie']);
Route::post('/state/readCookie', [StateController::class, 'session1']);
Route::get('/state/readCookie', [StateController::class, 'session2']);
Route::get('/record/hasmany', [RecordController::class, 'ma']);
Route::get('/save/{id}', [SaveController::class, 'edit']);
Route::patch('/save/{id}', [SaveController::class, 'update']);
Route::get('/save/{id}', [SaveController::class, 'show']);
Route::delete('/save/{id}', [SaveController::class, 'destroy']);
