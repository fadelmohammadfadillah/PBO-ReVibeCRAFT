<?php

use App\Http\Controllers\TutorialController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\reportController;
use App\Models\Tutorial;


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
    $tutorials = Tutorial::take(3)->get();
    return view('welcome', compact('tutorials'));
});

Auth::routes();
Route::post('addFeedback',[FeedbackController::class, 'store'] )->name('feedbackUser');
Route::get('/view/{tutorial}', [TutorialController::class, 'viewArticleTutorial'])->name('artikelTutorial');
Route::get('/formFeedback', [FeedbackController::class, 'viewFormFeedback'])->name('viewFormFeedback');
Route::group(['prefix' => 'dashboard/admin', 'middleware'=>['auth', 'role:admin']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [HomeController::class, 'profile'])->name('profile');
        Route::post('update', [HomeController::class, 'updateprofile'])->name('profile.update');
    });

    Route::controller(AkunController::class)
        ->prefix('akun')
        ->as('akun.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('showdata', 'dataTable')->name('dataTable');
            Route::match(['get','post'],'tambah', 'tambahAkun')->name('add');
            Route::match(['get','post'],'{id}/ubah', 'ubahAkun')->name('edit');
            Route::delete('{id}/hapus', 'hapusAkun')->name('delete');
            Route::get('/getUserId', 'getUserId')->name('getUserId');
        });
    Route::controller(TutorialController::class)
        ->prefix('tutorial')
        ->as('tutorial.')
        ->group(function (){
            Route::get('tutorial', 'index')->name('index');
            Route::get('tutorial/editPage', 'editTutorialPage')->name('editPage');
            Route::get('tutorialDetail/{id}', [TutorialController::class, 'showDetail'])->name('tutorialDetail');
            Route::get('tutorial/dataTutorial', [TutorialController::class, 'getDataTutorial'])->name('dataTutorial');
            Route::get('/viewTambah', 'addTutorialPage')->name('tambah');
            Route::post('tambahTutorial', 'store')->name('store');
            Route::post('{id}/edit', 'editTutorial')->name('edit');
            Route::delete('{id}/delete', 'deleteTutorial')->name('delete');
            Route::get('generateTutorialDocument', [TutorialController::class, 'generateTutorialDocument'])->name('generateTutorialDoc');
        });
        Route::controller(FeedbackController::class)
        ->prefix('feedback')
        ->as('feedback.')
        ->group(function (){
            Route::get('feedback', 'index')->name('index');
            Route::get('feedback/editPage', 'editFeedbackPage')->name('editPage');
            Route::get('feedbackDetail/{id}', [FeedbackController::class, 'showDetail'])->name('feedbackDetail');
            Route::get('feedback/dataFeedback', [FeedbackController::class, 'getDataFeedback'])->name('dataFeedback');
            Route::get('/viewTambah', 'addFeedbackPage')->name('tambah');
            Route::post('tambahFeedback', 'store')->name('store');
            Route::post('{id}/edit', 'editFeedback')->name('edit');
            Route::delete('{id}/delete', 'deleteFeedback')->name('delete');
        });
        Route::controller(RatingController::class)
        ->prefix('rating')
        ->as('rating.')
        ->group(function (){
            Route::get('rating', 'index')->name('index');
            Route::get('rating/editPage', 'editRatingPage')->name('editPage');
            Route::get('ratingDetail/{id}', [RatingController::class, 'showDetail'])->name('ratingDetail');
            Route::get('rating/dataRating', [RatingController::class, 'getDataRating'])->name('dataRating');
            Route::get('/viewTambah', 'addRatingPage')->name('tambah');
            Route::post('tambahRating', 'store')->name('store');
            Route::post('{id}/edit', 'editRating')->name('edit');
            Route::delete('{id}/delete', 'deleteRating')->name('delete');
        });

    Route::controller(reportController::class)
        ->prefix('report')
        ->as('report.')
        ->group(function (){
            Route::get('report', 'index')->name('index');
            Route::post('{id}/report', 'store')->name('report');
            Route::get('/list', 'list')->name('list');
            Route::get('tutorialReport/{id}', [reportController::class, 'showReport'])->name('tutorialReport');
            Route::get('/dataReportTutorial', [reportController::class, 'getDataReport'])->name('dataReportTutorial');
            Route::delete('{id}/delete', 'deleteReport')->name('delete');
        });
        
});


