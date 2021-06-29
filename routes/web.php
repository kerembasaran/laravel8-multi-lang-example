<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\OccupationController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\SurveyQuestionController;

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
    return redirect(app()->getLocale());
});

Route::prefix('{locale}')->where(['locale' => '[a-zA-Z]{2}'])->middleware('language')->group(function () {
    Route::get('/', [FrontController::class, 'index'])->name('index');
});


Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');

    Route::prefix('language')->group(function () {
        Route::get('/', [LanguageController::class, 'langList'])->name('language.langList');
        Route::post('/add', [LanguageController::class, 'languageAdd'])->name('language.add');
        Route::get('/groups', [LanguageController::class, 'groups'])->name('language.groups');
        Route::post('/groups/add', [LanguageController::class, 'groupAdd'])->name('language.groups.add');
        Route::get('/groups/{id}', [LanguageController::class, 'groupDetail'])->name('language.groupDetail');
        Route::post('/groups/detail-update/getText', [LanguageController::class, 'groupDetailGetText'])->name('language.groupDetail.getText');
        Route::post('/groups/detail-update', [LanguageController::class, 'groupDetailUpdate'])->name('language.groupDetailUpdate');
        Route::get('/phrase-add', [LanguageController::class, 'phraseAddShowForm'])->name('language.phraseAdd');
        Route::post('/phrase-add', [LanguageController::class, 'phraseAdd']);
    });

    Route::prefix('occupation')->group(function () {
        Route::get('/add', [OccupationController::class, 'occupationAddShow'])->name('occupation.add');
        Route::post('/add', [OccupationController::class, 'occupationAdd']);
    });

    Route::prefix('office')->group(function () {
        Route::get('/list', [OfficeController::class, 'list'])->name('office.list');
        Route::get('/add', [OfficeController::class, 'addShow'])->name('office.add');
        Route::post('/add', [OfficeController::class, 'add']);
    });

    Route::prefix('survey')->group(function () {
        Route::get('/question-add', [SurveyQuestionController::class, 'addShow'])->name('survey.question.add');
        Route::post('/question-add', [SurveyQuestionController::class, 'add']);
    });
});
